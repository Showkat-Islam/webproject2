<div class="info-bar-area style-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="info-bar-inner">
                    <div class="left-content">
                        <ul class="info-items-two">
                            @foreach($all_support_item as $data)
                                <li>
                                    <div class="single-info-item">
                                        <div class="icon">
                                            <i class="{{$data->icon}}"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">{{$data->title}}: <span class="details">{{$data->details}}</span></h5>

                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="right-content">
                        <ul class="social-icon">

                            <li class="title">{{__('Follow:')}}</li>
                            @foreach($all_social_item as $data)
                                <li><a href="{{$data->url}}"><i class="{{$data->icon}}"></i></a></li>
								
                            @endforeach
                        </ul>
                        @if(!empty(get_static_option('hide_frontend_language_change_option')))
                            <div class="language_dropdown" id="languages_selector">
                                <div class="selected-language">{{get_language_name_by_slug(get_user_lang())}} <i class="fas fa-caret-down"></i></div>
                                <ul>
                                    @foreach($all_language as $lang)
                                        <li data-value="{{$lang->slug}}">{{$lang->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-top-style-03">
    <nav class="navbar navbar-area navbar-expand-lg nav-style-02">
        <div class="container nav-container">
            <div class="navbar-brand">
                <a href="{{url('/')}}" class="logo">
                    {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo'),'full') !!}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    {!! render_menu_by_id($primary_menu_id) !!}
                </ul>
            </div>
            @if(!empty(get_static_option('navbar_button')))
                <div class="nav-right-content">
                    @php $quote_btn_url = !empty(get_static_option('navbar_button_custom_url_status')) ? get_static_option('navbar_button_custom_url') : route('frontend.request.quote'); @endphp
                    <a href="{{$quote_btn_url}}" class="get-quote">{{get_static_option('navbar_'.get_user_lang().'_button_text')}}</a>
                </div>
            @endif
        </div>
    </nav>
</div>
