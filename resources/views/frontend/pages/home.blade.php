    @extends('frontend.layouts.master', ['pages' => 'Home'])
    @section('seo')
    <title>{{$page->seo_title}}</title>
    <meta name="keywords" content="{{$page->seo_keywords}}" />
    <meta name="description" content="{{$page->seo_description}}" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta property="og:title" content="{{$page->page_name}}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{$page->seo_description}}" />
    <meta property="og:url" content="{{url()->full()}}" />
    <meta property="og:site_name" content="Export Approval" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no" />
    @endsection
@section('content')
@if ($agent->isMobile())

    <section class="uk-section uk-padding-small" style="background-color: {{$sections[0]->section_color}}">
        <span style="text-align: center !important;">
        {!! $sections[0]->section_content !!}
        </span>
        <div class="uk-margin-medium-bottom">
            <form id="search_form" action="{{route('frontend.site.search.page')}}" target="blank" method="POST">
            @csrf
            <div class="uk-inline uk-width-expanded">
                <button uk-icon="icon: search" type="submit" class="uk-background-primary uk-light uk-form-icon uk-form-icon-flip home-search-button" disabled style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </button>
                <input id="home_search" name="search_keywords" class="uk-input uk-border-rounded uk-form-medium" type="text" placeholder="Enter your product name OR compliance name" aria-label="Search">
                <div id="home_search_result" class="uk-hidden uk-width-1-1 uk-position-absolute uk-margin-remove uk-padding-remove uk-background-muted uk-border-rounded uk-box-shadow-large uk-height-small uk-overflow-auto">
                </div>
            </div>
            </form>
        </div>
        <span style="text-align: center !important;">
        {!! $sections[0]->section_description !!}
        </span>
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
                                <span class="home-service-description">{!!$service->service_description!!}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <div data-src="{{asset('frontend/images/indiamap.png')}}" uk-img class="uk-background-contain uk-padding-remove home-banner-image">
            </div>
            <div class="uk-width-1-1 uk-padding-remove">{!! $sections[0]->section_tagline !!}</div>
    </section>
    <section class="uk-section home-section-2 uk-padding-small">
        <div class="uk-text-center">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[1]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[1]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[1]->section_description !!}</p>
        </div>
        <div class="uk-section uk-padding-small uk-padding-remove-top uk-padding-remove-horizontal uk-margin-large-bottom">
            <div class="uk-child-width-1-4@m uk-grid-match uk-flex-center" uk-grid>
                @if($services)
                @foreach($services as $service)
                <div class="uk-margin-small-bottom home-ml-section">
                    <article class="uk-comment uk-padding-remove uk-card uk-box-shadow-large uk-card-body uk-border-rounded" role="comment">
                        <header class="uk-comment-header">
                            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                <div class="uk-width-1-3">
                                    <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                                </div>
                                <div class="uk-width-expand uk-padding-small uk-padding-remove-left">
                                    <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}#mandatory-product-list">
                                        <h4 class="uk-comment-title uk-margin-remove">Product list for {{$service->service_name}}</h4>
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
    <section class="uk-section home-section-3 uk-padding-remove" style="background-color: {{$sections[2]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[2]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[2]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[2]->section_description !!}</p>
        </div>
        <div class="uk-card uk-grid-collapse uk-margin" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container uk-width-2-5@m uk-border-rounded">
                <img src="{{$sections[2]->media_path}} " alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div class="uk-width-3-5@m">
                <div class="uk-card-body uk-padding-small">
                    {!! $sections[2]->section_content !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[3]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding-small" style="background-color: {{$sections[3]->section_color}}">
        <div class="section-two-heading uk-text-center">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[3]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[3]->section_tagline!!}</span>
        </div>
        <div class="section-description uk-text-justify">{!! $sections[3]->section_description !!}</div>
        <div class="uk-padding-remove uk-margin-remove uk-margin-bottom">
        {{-- {!! $sections[3]->section_content !!} --}}
        <div class="uk-section">
            <div class="uk-container">
            <div class="uk-grid-divider uk-grid" data-uk-grid="">
            <div class="uk-width-1-1 uk-width-1-4@m uk-first-column" uk-toggle="target: .wcu-one; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-one wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/cost-effective-1702021109.svg" alt="cost-effective" width="70" height="70" data-uk-img=""></div>
                <div class="uk-width-expand">
                <h3>Cost effective<br>solutions</h3>
                </div>
            </div>
            <div class="wcu-one wcu-tabs" uk-toggle="target: .wcu-one; mode: hover; animation: uk-animation-slide-left-small" hidden="">We deliver cost-effective solutions tailored to meet your diverse needs.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-two; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-two wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/step-payment-1702021109.svg" alt="part-payment" width="70" height="70" data-uk-img=""></div>
            <div class="uk-width-expand">
            <h3>Make Payment<br>step-by-step</h3>
            </div>
            </div>
            <div class="wcu-two wcu-tabs" uk-toggle="target: .wcu-two; mode: hover; animation: uk-animation-slide-left-small" hidden="">We offer flexible installment plans to let you pay at your own pace.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-four; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-four wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/projects-1702021109.svg" alt="Projects" width="70" height="70" data-uk-img=""></div>
            <div class="uk-width-expand">
            <h3 style="font-size: 16px !important;">Authorized Indian <br>Representative (AIR) Services</h3>
            </div>
            </div>
            <div class="wcu-four wcu-tabs" hidden="" uk-toggle="target: .wcu-four; mode: hover; animation: uk-animation-slide-left-small">We facilitate seamless market access for foreign manufacturers in India.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-three; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-three wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/rating-1702021109.svg" alt="Experience" width="70" height="70" data-uk-img=""></div>
            <div class="uk-width-expand">
            <h3>10+ years of experience</h3>
            </div>
            </div>
            <div class="wcu-three wcu-tabs" hidden="" uk-toggle="target: .wcu-three; mode: hover; animation: uk-animation-slide-left-small">We bring over 10 years of proven experience to achieve success in every project.</div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[4]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding-small" style="background-color: {{$sections[4]->section_color}}">
        <div class="section-two-heading uk-text-center">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[4]->section_name}} 
            </p>
            <span class="section-tagline uk-margin-remove-bottom">{!!$sections[4]->section_tagline!!}</span>
        </div>
        <div class="section-description uk-text-justify">{!! $sections[4]->section_description !!}</div>
        @if($blogs)
        <div class="uk-position-relative uk-visible-toggle uk-light uk-margin-large-bottom" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-4@m uk-grid" uk-height-match=".home-blog-tabs">
                @foreach($blogs as $blog)
                <li>
                    <div class="uk-card uk-card-default home-blog-tabs">
                        <div class="uk-card-media-top">
                            <img src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                        </div>
                        <div class="uk-card-body uk-padding-small uk-padding-remove-bottom">
                            <span class="home-blog-title"><a class="uk-link-reset" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">{{$blog->blog_title}}</a></span>
                            <span class="home-blog-content">
                                {!! $blog->blog_content !!}
                            </span>                
                            <div class="uk-margin-bottom">
                                <a class="home-blog-link" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">Read more</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        
            <a class="slider-arrows uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="slider-arrows uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        
        </div>
        @endif
    </section>
    @endif

    @else

    <section class="uk-section home-section-1 uk-child-width-expand@s uk-padding-large uk-padding-remove-vertical uk-padding-remove-right" uk-grid style="background-color: {{$sections[0]->section_color}}">
        <div class="uk-margin-top uk-margin-bottom home-banner-left">
            {!! $sections[0]->section_content !!}
            <div class="uk-margin-medium-bottom">
                <form id="search_form" class="uk-width-4-5" action="{{route('frontend.site.search.page')}}" target="blank" method="POST">
                @csrf
                <div class="uk-inline uk-width-expanded">
                    <button uk-icon="icon: search" type="submit" class="uk-background-primary uk-light uk-form-icon uk-form-icon-flip home-search-button" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </button>
                    <input id="home_search" name="search_keywords" class="uk-input uk-border-rounded uk-form-medium" type="text" placeholder="Enter your product name OR compliance name" aria-label="Search">
                    <div id="home_search_result" class="uk-hidden uk-width-1-1 uk-position-absolute uk-margin-remove uk-padding-remove uk-background-muted uk-border-rounded uk-box-shadow-large uk-height-small uk-overflow-auto">
                    </div>
                </div>
                </form>
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
                                    <span class="home-service-description">{!!$service->service_description!!}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="uk-padding-remove uk-margin-top">
            <div class="uk-width-1-1 uk-padding-remove">{!! $sections[0]->section_tagline !!}</div>
            <div data-src="{{asset('frontend/images/indiamap.png')}}" uk-img class="uk-background-contain uk-padding-remove home-banner-image">
            </div>
        </div>
    </section>
    <section class="uk-section home-section-2 uk-padding uk-padding-remove-vertical">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[1]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[1]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[1]->section_description !!}</p>
        </div>
        <div class="uk-section uk-padding-small uk-padding-remove-top uk-padding-remove-right uk-margin-large-bottom">
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
                                    <a class="uk-link-reset uk-text-center uk-text-bold" href="{{route('frontend.site.service', $service->service_slug)}}#mandatory-product-list">
                                        <h4 class="uk-comment-title uk-margin-remove">Product list<br>for<br>{{$service->service_name}}</h4>
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
    <section class="uk-section home-section-3 uk-padding uk-padding-remove-top" style="background-color: {{$sections[2]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[2]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[2]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[2]->section_description !!}</p>
        </div>
        <div class="uk-card uk-grid-collapse uk-margin" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container uk-width-2-5@m uk-border-rounded">
                <img src="{{$sections[2]->media_path}} " alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div class="uk-width-3-5@m">
                <div class="uk-card-body uk-padding-remove-vertical">
                    {!! $sections[2]->section_content !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[3]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding uk-padding-remove-vertical" style="background-color: {{$sections[3]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[3]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[3]->section_tagline!!}</span>
            <p class="section-description">{!! $sections[3]->section_description !!}</p>
        </div>
        <div class="uk-padding-remove uk-margin-remove uk-margin-bottom">
        {{-- {!! $sections[3]->section_content !!} --}}
        <div class="uk-section">
            <div class="uk-container">
            <div class="uk-grid-divider uk-grid" data-uk-grid="">
            <div class="uk-width-1-1 uk-width-1-4@m uk-first-column" uk-toggle="target: .wcu-one; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-one wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/cost-effective-1702021109.svg" alt="cost-effective" width="70" height="70" data-uk-img=""></div>
                <div class="uk-width-expand">
                <h3>Cost effective<br>solutions</h3>
                </div>
            </div>
            <div class="wcu-one wcu-tabs" hidden="">We deliver cost-effective solutions tailored to meet your diverse needs.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-two; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-two wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/step-payment-1702021109.svg" alt="part-payment" width="70" height="70" data-uk-img=""></div>
            <div class="uk-width-expand">
            <h3>Make Payment<br>step-by-step</h3>
            </div>
            </div>
            <div class="wcu-two wcu-tabs" hidden="">We offer flexible installment plans to let you pay at your own pace.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-four; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-four wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/rating-1702021109.svg" alt="Experience" width="70" height="70" data-uk-img=""></div>

            <div class="uk-width-expand">
            <h3>Get the AIR<br>Support</h3>
            </div>
            </div>
            <div class="wcu-four wcu-tabs" hidden="">We provide essential Authorized Indian Representory (AIR) service for foreign manufacturers.</div>
            </div>
            <div class="uk-width-1-1 uk-width-1-4@m" uk-toggle="target: .wcu-three; mode: hover; animation: uk-animation-slide-left-small">
            <div class="uk-grid-small uk-grid wcu-three wcu-tabs" data-uk-grid="">
            <div class="uk-width-auto uk-first-column"><img src="../../../../../../storage/media/projects-1702021109.svg" alt="Projects" width="70" height="70" data-uk-img=""></div>

            <div class="uk-width-expand">
            <h3>10+ Years of Service Excellance</h3>
            </div>
            </div>
            <div class="wcu-three wcu-tabs" hidden="">We bring over 10 years of proven experience to achieve success in every project.</div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>
    @endif
    @if($sections[4]->section_status == 1)
    <section class="uk-section home-section-3 uk-padding uk-padding-remove-vertical" style="background-color: {{$sections[4]->section_color}}">
        <div class="section-two-heading uk-text-center uk-padding">
            <p class="section-heading uk-margin-remove-bottom">
                {{$sections[4]->section_name}} 
            </p>
            <span class="section-tagline">{!!$sections[4]->section_tagline!!}</span>
            <div class="section-description uk-padding-large uk-padding-remove-vertical">{!! $sections[4]->section_description !!}</div>
        </div>
        @if($blogs)
        <div class="uk-position-relative uk-visible-toggle uk-light uk-margin-large-bottom uk-padding uk-padding-remove-vertical" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid" uk-height-match=".home-blog-tabs">
                @foreach($blogs as $blog)
                <li>
                    <div class="uk-card uk-card-default home-blog-tabs">
                        <div class="uk-card-media-top">
                            <img src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                        </div>
                        <div class="uk-card-body uk-padding-small uk-padding-remove-bottom">
                            <span class="home-blog-title"><a class="uk-link-reset" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">{{$blog->blog_title}}</a></span>
                            <span class="home-blog-content">
                                {!! $blog->blog_content !!}
                            </span>                
                            <div class="uk-margin-bottom">
                                <a class="home-blog-link" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">Read more</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        
            <a class="slider-arrows uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="slider-arrows uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        
        </div>
        @endif
    </section>
    @endif
    
@endif
@endsection
@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).keyup('#home_search', function(e) {
    var search = $('#home_search').val();
    var searchData = $('#search_form').serialize();
    if(search.length > 2){
        $('#home_search_result').removeClass('uk-hidden');
        $('#home_search_result').html('<div class="uk-text-center"><span uk-spinner="ratio: 3"></span></div>');
        $.ajax({
            url:"{{route('frontend.site.search')}}",
            method:"POST",
            data: searchData,
            success:function(response){
                $('#home_search_result').html(response);
            }
        });
        
    } else {
        $('#home_search_result').empty();
        $('#home_search_result').addClass('uk-hidden');
    }
});
</script>
@endsection