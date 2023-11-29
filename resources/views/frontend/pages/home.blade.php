    @extends('frontend.layouts.master', ['pages' => 'Home'])
    @section('seo')
    <title>"title"</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta property="og:title" content="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="{{env('APP_URL')}}" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no" />

    @endsection
    @section('content')
    <section class="uk-section home-section-1 uk-child-width-expand@s uk-padding-large uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
        <div class="uk-margin-top uk-margin-bottom home-banner-left">
            {!! $sections[0]->section_content !!}
            <div class="uk-margin-medium-bottom">
                <div class="uk-inline uk-width-1-1">
                    <button uk-icon="icon: search" class="uk-background-primary uk-light uk-form-icon uk-form-icon-flip home-search-button" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </button>
                    <input id="home-search" class="uk-input uk-border-rounded uk-form-medium" type="text" placeholder="Enter your product name OR compliance name" aria-label="Search">
                    <div id="home-search-result" class="uk-hidden uk-width-1-1 uk-position-absolute uk-margin-remove uk-padding-remove uk-background-muted uk-border-rounded uk-box-shadow-large uk-height-small"></div>
                </div>
            </div>
            {!! $sections[0]->section_description !!}
            <div class="uk-container uk-child-width-1-2 uk-padding-remove uk-width-expand uk-flex-center" uk-grid>
                @if($services)
                @foreach($services as $service)
                <div class="uk-background-transparent uk-margin-remove">
                    <div class="uk-card-header uk-padding-remove">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-border-circle uk-box-shadow-medium home-services-img uk-background-default" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                            </div>
                            <div class="uk-width-expand uk-margin-top">
                                <a class="uk-text-decoration-none" href="{{route('frontend.site.service', $service->service_slug)}}">
                                    <h3 class="uk-card-title uk-margin-remove-bottom home-services-tabs">{{$service->service_name}}</h3>
                                    <span>{!!$service->service_description!!}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="uk-padding-remove uk-margin-top uk-margin-bottom">
            <div class="uk-width-1-1 uk-padding-remove">{!! $sections[0]->section_tagline !!}</div>
            <div data-src="{{asset('frontend/images/indiamap.png')}}" uk-img class="uk-background-contain uk-padding-remove uk-height-1-1">
            </div>
        </div>
    </section>
    <section class="uk-section home-section-2 uk-padding">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading">
                {{$sections[1]->section_name}} 
            </p>
            <span class="section-tagline">{{$sections[1]->section_tagline}}</span>
            <p class="section-description">{!! $sections[1]->section_description !!}</p>
        </div>
        <div class="uk-section uk-padding-small uk-padding-remove-top uk-padding-remove-right">
            <div class="uk-child-width-1-4@m uk-grid-match uk-flex-center" uk-grid>
                @if($services)
                @foreach($services as $service)
                <div class="uk-margin-remove home-ml-section">
                    <article class="uk-comment uk-padding-remove uk-card uk-box-shadow-large uk-card-body uk-border-rounded" role="comment">
                        <header class="uk-comment-header">
                            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                                </div>
                                <div class="uk-width-expand uk-padding-small uk-padding-remove-left">
                                    <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}"><h4 class="uk-comment-title uk-margin-remove">{{$service->service_name}}</h4>
                                    <span>{!!$service->service_description!!}</span>
                                    <p class="uk-margin-remove-vertical uk-padding-remove uk-text-small view-all-products">View All Products</p>
                                    </a>
                                </div>
                            </div>
                        </header>
                    </article>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @if($sections[2]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[2]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading">
                {{$sections[2]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[2]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[2]->section_description !!}</p>
        </div>
        <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <img src="images/light.jpg" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    {!! $sections[2]->section_content !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[3]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[3]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading">
                {{$sections[3]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[3]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[3]->section_description !!}</p>
        </div>
        <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="{{$sections[3]->media_path}}" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    {!! $sections[3]->section_content !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[4]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[4]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading">
                {{$sections[4]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[4]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[4]->section_description !!}</p>
        </div>
        @if($blogs)
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid" uk-height-match=".home-blog-tabs">
                @foreach($blogs as $blog)
                <li>
                    <div class="uk-card uk-card-default home-blog-tabs">
                        <div class="uk-card-media-top">
                            <img src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                        </div>
                        <div class="uk-card-body">
                            <a href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}"><span class="uk-card-title">{{$blog->blog_title}}</span></a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        
        </div>
        @endif
    </section>
    @endif
    <section class="uk-section uk-padding-remove uk-background-muted clients-scroll">
        <div class="uk-container uk-padding-small">
            <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 1000; finite: false; easing: ease;sets: false;">
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-6@s uk-child-width-1-8@m uk-grid">
                    @if($clients)
                    @foreach($clients as $client)
                    <li>
                        <img src="{{$client->media_path}}" width="100%" height="100%" alt="{{$client->img_alt}}">
                    </li>
                    @endforeach
                    @endif
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
            
        </div>
    </section>
    @endsection
    @section('scripts')
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).keyup('#home-search', function(e) {
        var search = $(this).val();
        if(search != ''){
            $.ajax({
                url:"{{route('frontend.site.search')}}",
                method:"POST",
                data:{search:search},
                success:function(response){
                    $('#home-search-result').html(response);
                    $('#home-search-result').removeClass('uk-hidden');
                }
            });
        }
    });
    </script>
    @endsection