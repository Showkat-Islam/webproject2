@extends('backend.admin-master')
@section('site-title')
    {{__('Work Process Area')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Work Process Area Settings')}}</h4>
                        <form action="{{route('admin.service.home.work.process.area')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($all_languages as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if($key == 0) active @endif" data-toggle="tab" href="#tab_{{$key}}" role="tab"  aria-selected="true">{{$lang->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content margin-top-30" id="myTabContent">
                                @foreach($all_languages as $key => $lang)
                                    <div class="tab-pane fade @if($key == 0) show active @endif" id="tab_{{$key}}" role="tabpanel" >
                                        <div class="form-group">
                                            <label for="home_page_06_{{$lang->slug}}_work_process_area_title">{{__('Title')}}</label>
                                            <input type="text" name="home_page_06_{{$lang->slug}}_work_process_area_title" class="form-control" value="{{get_static_option('home_page_06_'.$lang->slug.'_work_process_area_title')}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_06_{{$lang->slug}}_work_process_area_description">{{__('Description')}}</label>
                                            <textarea name="home_page_06_{{$lang->slug}}_work_process_area_description" class="form-control" cols="30" rows="10">{{get_static_option('home_page_06_'.$lang->slug.'_work_process_area_description')}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @php
                            $all_icon_fields =  get_static_option('home_page_06_work_process_number');
                            $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['1'];
                            @endphp
                            @foreach($all_icon_fields as $index => $icon_field)
                            <div class="iconbox-repeater-wrapper">
                                <div class="all-field-wrap">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach($all_languages as $key => $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($key == 0) active @endif" data-toggle="tab" href="#tab_{{$lang->slug}}_{{$key + $index}}" role="tab"  aria-selected="true">{{$lang->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content margin-top-30" id="myTabContent">
                                        @foreach($all_languages as $key => $lang)
                                            @php
                                                $all_title_fields = get_static_option('home_page_06_'.$lang->slug.'_work_process_title');
                                                $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [__('Signup/Login')];
                                            @endphp
                                            <div class="tab-pane fade @if($key == 0) show active @endif" id="tab_{{$lang->slug}}_{{$key + $index}}" role="tabpanel" >
                                                <div class="form-group">
                                                    <label for="home_page_06_{{$lang->slug}}_work_process_title">{{__('Title')}}</label>
                                                    <input type="text" name="home_page_06_{{$lang->slug}}_work_process_title[]" class="form-control" value="{{$all_title_fields[$index]}}">
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            <label for="home_page_06_work_process_number">{{__('Number')}}</label>
                                            <input type="text" name="home_page_06_work_process_number[]" class="form-control" value="{{$all_icon_fields[$index]}}">
                                        </div>
                                    </div>
                                    <div class="action-wrap">
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
    <script>
        $(document).ready(function ($){
           "use strict";

            $('.icp-dd').iconpicker();
            $('body').on('iconpickerSelected','.icp-dd', function (e) {
                var selectedIcon = e.iconpickerValue;
                console.log(selectedIcon)
                $(this).parent().parent().children('input').val(selectedIcon);
            });

            $(document).on('click','.all-field-wrap .action-wrap .add',function (e){
                e.preventDefault();

                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.all-field-wrap');
                var clonedData = parent.clone();
                var containerLength = container.length;
                clonedData.find('#myTab').attr('id','mytab_'+containerLength);
                clonedData.find('#myTabContent').attr('id','myTabContent_'+containerLength);
                var allTab =  clonedData.find('.tab-pane');
                allTab.each(function (index,value){
                    var el = $(this);
                    var oldId = el.attr('id');
                    el.attr('id',oldId+containerLength);
                });
                var allTabNav =  clonedData.find('.nav-link');
                allTabNav.each(function (index,value){
                    var el = $(this);
                    var oldId = el.attr('href');
                    el.attr('href',oldId+containerLength);
                });

                parent.parent().append(clonedData);

                if (containerLength > 0){
                    parent.parent().find('.remove').show(300);
                }
                parent.parent().find('.icp-dd').iconpicker();

            });

            $(document).on('click','.all-field-wrap .action-wrap .remove',function (e){
                e.preventDefault();

                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.all-field-wrap');

                if (container.length > 1){
                    el.show(300);
                    parent.hide(300);
                    parent.remove();
                }else{
                    el.hide(300);
                }
            });


        });
    </script>
@endsection

