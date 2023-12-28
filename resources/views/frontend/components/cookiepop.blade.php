<div class="uk-width-1-1 uk-position-fixed uk-position-bottom uk-overlay uk-overlay-primary uk-box-shadow-large cookie-pop" uk-height-match=".cookie-pop-div">
    <div uk-grid>
            <div class="uk-width-4-5@m"><span class="uk-text-small uk-text-bold cookie-pop-div">We value your privacy</span>
            <p class="uk-small">We use cookies and tracking technologies to enhance your website experience. Personal data like IP address and browsing information may be processed for personalized ads, content measurement, and services development.</p>
            <p class="uk-small">We prioritize transparency and security in your browsing experience, and you can manage consent preferences anytime.</p>
        </div>
        <div class="uk-width-1-5@m uk-text-middle cookie-pop-div">
            <button onclick="acceptAll()" class="uk-button uk-button-default">Accept All</button>
            <button onclick="rejectAll()" class="uk-button uk-button-default">Reject</button>
        </div>
    </div>
</div>
<script>
    function acceptAll() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{route('frontend.site.cookie.accept')}}",
            method:"GET",
            success:function(response){
                $('.cookie-pop').addClass('uk-hidden');
            }
        });
        
    }
    function rejectAll() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{route('frontend.site.cookie.reject')}}",
            method:"GET",
            success:function(response){
                alert();
                $('.cookie-pop').addClass('uk-hidden');
            }
        });
        
    }
</script>