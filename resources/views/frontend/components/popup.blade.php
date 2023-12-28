

<div id="site-pop-up" class="uk-modal-container" uk-modal="bg-close: false; esc-close: false;">
    <div class="uk-modal-dialog uk-modal-body uk-text-center">
        <button onclick="popupclose()" class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-padding-large uk-padding-remove-horizontal" style="border-right: 1px solid #c9c9c9!important;">
                <h4 class="uk-h1 uk-text-bold site-blue">Welcome</h4>
                <h4 class="uk-h1 uk-text-bold site-blue">to</h4>
                <img class="uk-margin-top" src="{{asset('frontend/images/logo.png')}}">
            </div>
            <div>
                <div class="uk-card-body">
                <p class="uk-h3 uk-text-bold site-orange">Enabling your Products for Export to India</p>
                <p class="uk-h2 uk-text-bold site-blue uk-margin-large-top">Explore to obtain<br>all required certifications<br> for Indian Market</p>
                <button onclick="popupclose()" class="uk-text-bold uk-button partner-form-btn uk-border-rounded uk-modal-close uk-margin-top" type="button">Now explore this website</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    UIkit.modal('#site-pop-up').show();
    function popupclose() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{route('frontend.site.popup.close')}}",
            method:"GET",
            success:function(response){

            }
        });
    }
</script>
