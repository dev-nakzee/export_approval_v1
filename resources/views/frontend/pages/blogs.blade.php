@extends('frontend.layouts.master', ['pages' => 'Blogs'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small" style="color: #8b8b8b;">{{'Export Approval'}}</span>
            <br>{{'Blogs'}}
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
                    <span class="uk-padding-remove-left uk-text-bold">{{'Blog Categories'}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($categories)
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('frontend.site.blog.category',$category->blog_category_slug)}}">{{$category->blog_category_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-margin-top download-brochure-btn uk-padding-remove" href="#download-brochure"><svg fill="#052faa" height="800px" width="800px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
  <g>
    <path d="m100.3,294.1l155.7,155.9 155.7-155.8h-69.3c-11.2,0-20.3-9.1-20.3-20.3v-222.2h-137.3v222.1c0,11.2-9.1,20.3-20.3,20.3h-64.2zm141.3,199l-204.6-204.9c-5.8-5.8-7.5-14.6-4.4-22.2 3.1-7.6 10.5-12.6 18.8-12.6h92.9v-222.1c0-11.2 9.1-20.3 20.3-20.3h177.9c11.2,0 20.3,9.1 20.3,20.3v222.1h98c8.2,0 15.6,5 18.8,12.6 3.1,7.6 1.4,16.3-4.4,22.2l-204.8,204.9c-10.5,10.4-18.2,10.6-28.8,0z"/>
  </g>
</svg> {{'Download Brochure'}}</a>
                </div>
            </div>
            <div class="uk-section uk-width-3-4@m uk-padding-remove-right uk-padding-remove-vertical">
                <div class="uk-child-width-1-1@s uk-child-width-1-3@m uk-grid-small" uk-grid="masonry: pack">
                    @if($blogs)
                    @foreach($blogs as $blog)
                    <div>
                        <div class="blog-cards uk-card uk-card-default uk-card-body uk-margin-bottom uk-box-shadow-large uk-padding-small">
                            <article class="uk-article">
                                <img class="uk-margin-bottom blogs-group-image" src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                                <span class="uk-article-title uk-text-large uk-text-bold blogs-group-title"><a class="uk-link-reset" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">{{$blog->blog_title}}</a></span>
                            
                                <p class="uk-article-meta">Written by Export Approval on {{$blog->created_at}}</p>
                            
                                <div class="blog-content">{!! $blog->blog_content !!}</div>

                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                    <div>
                                        <a class="uk-button uk-button-text" href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}">Read more</a>
                                    </div>
                                </div>
                                
                            </article>
                        </div>
                    </div>
                    @endforeach
                    <div class="uk-width-1-1 blog-pagination">
                        {{ $blogs->links() }}
                    </div>
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