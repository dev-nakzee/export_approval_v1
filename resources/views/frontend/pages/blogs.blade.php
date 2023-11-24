@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <h1>
            {{'Blogs'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-remove uk-width-1-1">
    <div class="uk-container uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>Blogs</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-remove" uk-scrollspy="offset: 80px">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <span class="uk-margin-bottom uk-heading-bullet uk-text-bold">Blog categories</span>
                <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                    @if($categories)
                    @foreach($categories as $category)
                        <li>
                            <a href="#{{$category->blog_category_slug}}">{{$category->blog_category_name}}</a>
                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="uk-width-expand@m">
              
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection