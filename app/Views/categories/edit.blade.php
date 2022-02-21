@extends('admin.layouts.master')
@section('content')

@push('css')
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
@endpush

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ __('locale.edit') }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="POST" action="{{route('admin.categories.update', $category->id)}}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>{{ __('locale.name_ar') }}</label>
                            <input type="text" name="name_ar"
                                value="{{old('name_ar', $category->getTranslation('name', 'ar'))}}"
                                class="form-control @error('name_ar') is-invalid @enderror"
                                placeholder="{{ __('locale.name_ar') }}">
                            @error('name_ar')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('locale.name_en') }}</label>
                            <input type="text" name="name_en"
                                value="{{old('name_en', $category->getTranslation('name', 'en'))}}"
                                class="form-control @error('name_en') is-invalid @enderror"
                                placeholder="{{ __('locale.name_en') }}">
                            @error('name_en')
                            <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="custom-file-container col-md-12" data-upload-id="myUniqueUploadId1">
                            <label><a href="javascript:void(0)"
                                    class="custom-file-container__image-clear text-secondary" title="Clear Image"> {{
                                    __('locale.main_image') }} &times;</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" name="image" value="{{ old('image') }}"
                                    class="custom-file-container__custom-file__custom-file-input"
                                    aria-label="{{ __('locale.choose_image') }}">
                                @error('image')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                                <span
                                    class="custom-file-container__custom-file__custom-file-control {{ ( app()->getLocale() == 'ar' ) ? 'text-left' : '' }}"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('locale.update') }}</button>
                    <a type="button" href="{{route('admin.categories.index')}}" class="btn btn-danger">{{
                        __('locale.back') }}</a>
                </form>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

@endsection
