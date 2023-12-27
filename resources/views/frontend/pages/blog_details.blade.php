@extends('frontend.layouts.master', ['pages' => 'Blog Details'])
@section('content')
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/blog.png')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                {{'Blogs'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$blog->blog_category_name}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.blog')}}">Blogs</a></li>
            <li><a href="{{route('frontend.site.blog.category', $category_slug)}}">{{$category_slug}}</a></li>
            <li><span>{{$blog->blog_title}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <div class="uk-section uk-padding-remove">
        @if($blog)
        <article class="uk-article">
            <h1 class="uk-article-title blog-detail-title">{{$blog->blog_title}}</h1>
            <p class="uk-article-meta">Written by Export Approval on {{$blog->created_at}}</p>
            <img class="uk-margin-bottom uk-width-1-1" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">                   
            <div>
                {!! $blog->blog_content !!}
            </div>
        
        </article>
        @endif
    </div>
    <div class="uk-margin-top uk-margin-bottom social-share-section uk-text-center">
        <span class="uk-text-bold">Share this blog</span><br>
        <a href="" class="twitter" uk-icon="twitter"></a>
        <a href="" class="facebook" uk-icon="facebook"></a>
        <a href="" class="linkedin" uk-icon="linkedin"></a>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/blog.png')}}" alt="Blogs Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                {{'Blogs'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$blog->blog_category_name}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.blog')}}">Blogs</a></li>
            <li><a href="{{route('frontend.site.blog.category', $category_slug)}}">{{$category_slug}}</a></li>
            <li><span>{{$blog->blog_title}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-text-bold">
                        <img class="uk-border-circle title-page-image uk-margin-right" src="{{asset('frontend/images/blog.png')}}" alt="Blog Image">
                        {{'Blog Categories'}}
                    </span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a class="uk-link-reset" href="{{route('frontend.site.blog.category',$category->blog_category_slug)}}">{{$category->blog_category_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-margin-top download-brochure-btn uk-padding-remove" href="#download-brochure">
                        <svg fill="#052faa" height="800px" width="800px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                        <g>
                            <path d="m100.3,294.1l155.7,155.9 155.7-155.8h-69.3c-11.2,0-20.3-9.1-20.3-20.3v-222.2h-137.3v222.1c0,11.2-9.1,20.3-20.3,20.3h-64.2zm141.3,199l-204.6-204.9c-5.8-5.8-7.5-14.6-4.4-22.2 3.1-7.6 10.5-12.6 18.8-12.6h92.9v-222.1c0-11.2 9.1-20.3 20.3-20.3h177.9c11.2,0 20.3,9.1 20.3,20.3v222.1h98c8.2,0 15.6,5 18.8,12.6 3.1,7.6 1.4,16.3-4.4,22.2l-204.8,204.9c-10.5,10.4-18.2,10.6-28.8,0z"/>
                        </g>
                        </svg> {{'Download Brochure'}}
                    </a>
                </div>
            </div>
            <div class="uk-section uk-width-3-4@m uk-padding-remove-right uk-padding-remove-vertical">
                <div class="uk-section uk-padding-remove">
                    @if($blog)
                    <article class="uk-article">
                        <h1 class="uk-article-title blog-detail-title">{{$blog->blog_title}}</h1>
                        <p class="uk-article-meta">Written by Export Approval on {{$blog->created_at}}</p>
                        <img class="uk-margin-bottom uk-width-1-1" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">                   
                        <div>
                            {!! $blog->blog_content !!}
                        </div>
                    
                    </article>
                    @endif
                </div>
                <div class="uk-margin-top uk-margin-bottom social-share-section">
                    <span class="uk-text-bold">Share this blog</span><br>
                    <a class="w-inline-block social-share-btn tw twitter" uk-icon="twitter" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"></a>
                    <a class="w-inline-block social-share-btn fb facebook" uk-icon="facebook" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"> </a>
                    <a class="w-inline-block social-share-btn lnk linkedin" uk-icon="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;"></a>                    
                </div>
                @include('frontend.components.downloadbrochure')
            </div>
        </div>
    </div>
</section>
@endif
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function(){
            var scrollTop = 80;
            if($(window).scrollTop() >= scrollTop){
                $('.ps-details-section').addClass('ps-sidebar-fixed');  
            }
            if($(window).scrollTop() < scrollTop){
                $('.ps-details-section').removeClass('ps-sidebar-fixed');  
            }
        });
    });
</script>
<style>
    .ps-sidebar-fixed {
        width: 105% !important;
    }
</style>
@endsection