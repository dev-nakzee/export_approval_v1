@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            {{'Blogs'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'Blogs'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-padding-remove-left uk-heading-bullet uk-text-bold">{{'Blog Categories'}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('frontend.site.blog.category',$category->blog_category_slug)}}">{{$category->blog_category_name}}</a>
                            </li>
                        @endforeach
                        @endif
                        <li>
                            <a href="#">{{'Download Brochure'}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-section uk-width-3-4@m uk-padding-remove-right uk-padding-remove-vertical">
                <div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-grid-small" uk-grid="masonry: pack">
                    @if($blogs)
                    @foreach($blogs as $blog)
                    <div>
                        <div class="blog-cards uk-card uk-card-default uk-card-body uk-margin-bottom uk-box-shadow-large uk-padding-small">
                            <article class="uk-article">
                                <img class="uk-margin-bottom" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                                <span class="uk-article-title uk-text-large uk-text-bold"><a class="uk-link-reset" href="">{{$blog->blog_title}}</a></span>
                            
                                <p class="uk-article-meta">Written by Export Approval on {{$blog->created_at}}</p>
                            
                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                    <div>
                                        <a class="uk-button uk-button-text" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">Read more</a>
                                    </div>
                                </div>
                            
                            </article>
                        </div>
                    </div>
                    @endforeach
                        @if ($blogs->hasPages())
                            <div class="pagination-wrapper">
                                {{ $blogs->links() }}
                            </div>
                        @endif
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
    $(document).on('click', '.notice-detail-link', function() {
        var url = $(this).data('link');
        window.location.href = url;
    })
</script>
@endsection