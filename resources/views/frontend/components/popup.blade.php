<div id="site-pop-up" class="uk-modal-container" uk-modal="bg-close: false; esc-close: false;">
    <div class="uk-modal-dialog uk-modal-body">
        <button onclick="popupclose()" class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-padding-large uk-padding-remove-horizontal uk-text-center" style="border-right: 1px solid #c9c9c9!important;">
                <h4 class="uk-h2 uk-text-bold site-blue uk-margin-remove">Welcome</h4>
                <h4 class="uk-h3 uk-text-bold site-blue uk-margin-remove">to</h4>
                <img class="uk-margin-large uk-margin-remove-top uk-margin-remove-horizontal" style="height: 60px !important;" src="{{asset('frontend/images/logo.png')}}">
                <h4 class="uk-h3 uk-text-bold site-blue">This website is about<br>Regulatory Product Compliance<br>for Indian Market</h4>
            </div>
            <div>
                <div class="uk-card-body">
                <p class="uk-h4 uk-text-bold uk-text-justify">Dear Visitor,<br><br>You will find here, <u>how to enable your product for export to India.</u></p>
                <p class="uk-h3 uk-text-bold uk-text-center uk-margin-large-top site-blue">We are looking forword<br>to partner with you for the<br>same<br>
                <button onclick="popupclose()" class="uk-text-bold uk-button partner-form-btn uk-border-rounded uk-modal-close uk-margin-large-top" type="button">Please explore to website</button>
                </p>
               
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
