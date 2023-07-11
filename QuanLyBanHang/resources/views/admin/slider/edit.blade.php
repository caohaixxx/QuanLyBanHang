@extends('admin.layout.master')

@section('addcssadmin')
@endsection

@section('bodyadmin')
    @include('admin.partials.form-slider', [
        'action'=> route('admin.slider.update', ['id' => $slider->id]),
        'method'=>'post',
        'slider' => $slider
        ])
@endsection
@section('addjsadmin')
<script>
    function preview_thumbail(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_brand')
                .attr('src', e.target.result)
                .width(100)
                .height(auto)
        };
        reader.readAsDataURL(input.files[0]);
    }
};
    exampleInputFile.onchange = evt => {
        const [file] = exampleInputFile.files
        if (file) {
            img_brand.src = URL.createObjectURL(file)
        }
    };

</script>
@endsection
