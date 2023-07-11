<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $sliders;

    public function __construct(Slier $sliders)
    {
        $this->sliders = $sliders;
    }
    public function index(Request $request)
    {
        $sliders = Slier::select(
            'id',
            'name',
            'image',
            'status',
        );
        
        if(isset($request->search)){
            $sliders->where('brands.name', 'like', '%' . $request->search . '%');
        }
        $sliders = $sliders->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        try {
            DB::beginTransaction();
            $param = [
                'name' => $request->name,
                'status' => $request->status,
            ];
            $img = $this->Upload($request, 'image', 'slider');
            if (!empty($img)) {
                $param['image'] = $img['file_path'];
            }
            $a = $this->sliders->create($param);
            DB::commit();
            return redirect()->route('admin.slider.index')->with([
                'status_succeed' => trans('message.create_slider_successd')
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return back()->with([
                'status_failed' => trans('message.server_error')
            ]);
        }
    }

    public function edit($id)
    {
        $slider = Slier::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {
        try {
            $sliders = $this->sliders->find($id);
            if ($sliders) {
                DB::beginTransaction();
                $param = [
                    'name' => $request->name,
                    'status' => $request->status,
                ];
                $img = $this->Upload($request, 'image', 'slider');
                if (!empty($img)) {
                    $param['image'] = $img['file_path'];
                }
                $sliders = $sliders->update($param);
                DB::commit();
                return redirect()->route('admin.slider.index')->with([
                    'status_succeed' => trans('message.update_slider_success')
                ]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return back()->with([
                'status_failed' => trans('message.server_error')
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slier::find($id);
            if ($slider) {
                DB::beginTransaction();
                $slider->delete();
                DB::commit();
                return [
                    'status' => Response::HTTP_OK,
                    'msg' => [
                        'text' => trans('message.success'),
                    ],
                ];
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());
            return response()->json([
                'code' => \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => trans('message.server_error')
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
