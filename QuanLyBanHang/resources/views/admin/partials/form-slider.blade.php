<section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">{{ Route::is('admin.slider.create') ? trans('language.create_slider') : trans('language.edit_slider') }}</h3>
                        </div>
                        <!-- form start -->
                        <form method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{trans('language.slider_name')}}</label>
                                    <input type="text" class="form-control" id="slug" placeholder="Nhập tên slider" name="name" value="{{old('name') ? old('name') : (isset($slider->name) ? $slider->name : '')}}">
                                    @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">{{trans('language.image')}}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="">
                                            <label class="custom-file-label" for="exampleInputFile">{{trans('language.choose_img')}}</label>
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    <img class="img-pr" id="img_brand" src="{{ isset($slider) ? asset($slider->image) : '' }}" alt="your image" onerror="this.onerror=null;this.src='{{ asset('images/preview.png') }}';">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('language.status') }}:</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="status"
                                        required>
                                        <option {{ isset($slider) ? ($slider->status == 0 ? 'selected' : '') : ''}} value="0">{{trans('language.active')}}</option>
                                        <option {{isset($slider) ? ($slider->status == 1 ? 'selected' : '') : ''}} value="1">{{trans('language.not_active')}}</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ Route::is('admin.slider.create') ?
                                    trans('language.create') : trans('language.update') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

