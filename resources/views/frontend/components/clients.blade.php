<section class="uk-section uk-padding-large uk-padding-remove-vertical uk-background-muted clients-scroll">
    <h3 class="uk-heading uk-text-center"><span>Our Happy Clients</span></h3>
    <div class="uk-position-relative uk-visible-toggle uk-dark" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 1000; finite: false; easing: ease;sets: false;">
        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-6@s uk-child-width-1-8@m uk-grid">
            @if($clients)
            @foreach($clients as $client)
            <li>
                <img src="{{$client->media_path}}" width="50%" height="50%" alt="{{$client->img_alt}}">
            </li>
            @endforeach
            @endif
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
    </div>
</section>