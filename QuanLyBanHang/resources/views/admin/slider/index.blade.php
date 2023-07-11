@extends('admin.layout.master')

@section('addcssadmin')
@endsection

@section('bodyadmin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{trans('language.brand')}}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card ">
                        <div class="card-header">
                            <div class="filter">
                                <div class="search-container">
                                    <form action="">
                                      <input type="text" placeholder="{{trans('language.search_form')}}" name="search">
                                      <button type="submit">Submit</button>
                                    </form>
                                  </div>
                                <a class="btn btn-success btn-sm rounded-0 create"
                                    href="{{ route('admin.slider.create') }}"><i class="fa fa-plus pad"></i>{{trans('language.create')}}</a>
                            </div>

                        </div>
                        <!-- form start -->
                        <table class="table table-bordered table-image">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">{{trans('language.slider_name')}}</th>
                                    <th class="text-center" scope="col">{{trans('language.image')}}</th>
                                    <th class="text-center" scope="col">{{trans('language.status')}}</th>
                                    <th class="text-center" scope="col-3">{{trans('language.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $idx => $slider)
                                    <tr br-name>
                                        <td class="text-center">
                                            {{ isset($idx) ? ($sliders->currentPage() - 1) * $sliders->perPage() + $idx + 1 : '' }}
                                        </td>
                                        <td class="text-center ">{{ $slider->name }}</td>
                                        <td class="text-center"><img src="{{ asset($slider->image) }}"  alt=""
                                                class="img-br"></td>
                                        <td class="text-center">{!! \App\Models\Slier::checkStatus($slider->status) !!}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm rounded-0" href="{{ route('admin.slider.edit', ['id' => $slider->id]) }}"><i class="fa fa-edit pad"></i>{{ trans('language.edit') }}</a>
                                            @if($slider->deleted_at  == null)
                                            <a class="btn btn-danger btn-sm rounded-0 deleteTable" href="{{ route('admin.slider.destroy', ['id' => $slider->id]) }}"
                                                data-id="{{$slider->id}}"
                                                data-title="{{trans('message.confirm_delete_slider')}}" 
                                                data-text="<span >{{$slider->name}}</span>" 
                                                data-url="{{ route('admin.slider.destroy', ['id' => $slider->id]) }}"
                                                data-method="DELETE" data-icon="question">
                                                <i class="fa fa-trash pad"></i>{{ trans('language.delete') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div style="float: right; padding-right: 10px">
                                {{ $sliders->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('addjsadmin')
@endsection
