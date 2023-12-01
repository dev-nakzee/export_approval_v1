@extends('frontend.layouts.master', ['pages' => 'Blog Details'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            {{$blog->blog_title}}
        </h1>
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
                    <span class="uk-margin-small-left uk-heading-bullet uk-text-bold">{{'Industrial Notifications'}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('frontend.site.blog.category',$category->blog_category_slug)}}">{{$category->blog_category_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-width-1-1 uk-margin-top download-brochure-btn" href="#download-brochure">{{'Download Brochure'}}</a>
                </div>
            </div>
            <div class="uk-section uk-width-3-4@m uk-padding-remove-right uk-padding-remove-vertical">
                <div class="uk-container">
                    @if($blog)
                    <article class="uk-article">
                        <h1 class="uk-article-title"><a class="uk-link-reset" href="">{{$blog->blog_title}}</a></h1>
                        <p class="uk-article-meta">Written by Export Approval on {{$blog->created_at}}</p>
                        <img class="uk-margin-bottom" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">                   
                        <div>
                            {!! $blog->blog_content !!}
                        </div>
                    
                    </article>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
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
@endsection
{{-- @extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <h1>
            {{$blog->blog_title}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-remove uk-width-1-1">
    <div class="uk-container uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.blog')}}">Blogs</a></li>
            <li><a href="{{route('frontend.site.blog')}}">Blogs</a></li>
            <li><span>{{$blog->blog_title}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-remove" uk-scrollspy="offset: 80px">
    <div class="uk-section">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <span class="uk-margin-bottom uk-heading-bullet uk-text-bold">Blog categories</span>
                <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                    @if($categories)
                    @foreach($categories as $category)
                        <li>
                            <a href="{{$category->blog_category_slug}}">{{$category->blog_category_name}}</a>
                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="uk-width-expand@m">
                <div>
                    <img class="img-responsive uk-margin-bottom" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                    <article class="uk-article">

                        <h1 class="uk-article-title"><a class="uk-link-reset" href="">{{$blog->blog_title}}</a></h1>
                        <p class="uk-article-meta">Posted on {{$blog->created_at}}</p>
                        {!! $blog->blog_content !!}
                        <div class="uk-grid-small uk-child-width-auto" uk-grid>
                            <div>
                                <a class="uk-button uk-button-text" href="#">Read more</a>
                            </div>
                            <div>
                                <a class="uk-button uk-button-text" href="#">5 Comments</a>
                            </div>
                        </div>
                    
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection --}}