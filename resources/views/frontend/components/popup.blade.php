<div id="site-pop-up" uk-modal="bg-close: false; esc-close: false;">
    <div class="uk-width-1-2@m uk-width-1-1@s uk-modal-dialog uk-modal-body">
        <button onclick="popupclose()" class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-child-width-1-1">
            <div class="uk-padding@m uk-padding-remove-horizontal@s uk-text-center">
                <h4 class="uk-h2 uk-text-bold site-blue uk-margin-remove">Welcome to <span class="site-blue">Export</span><span class="site-orange">Approval</span>!</h4>
                <p class="uk-h4 uk-text-normal uk-text-justify">Dear Visitor,<br><br>You will find Regulatory Product Compliance solutions here, <span class="site-blue uk-text-bolder">how to enable your product for Export to India?</span><br><br>We are looking forword to assist you further.</p>
                <button onclick="popupclose()" class="uk-text-bold uk-button partner-form-btn uk-border-rounded uk-text-center uk-modal-close uk-margin-large-top" type="button">Explore Now</button>
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
