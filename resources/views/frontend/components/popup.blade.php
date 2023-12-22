

<div id="site-pop-up" uk-modal="bg-close: false; esc-close: false;">
    <div class="uk-modal-dialog uk-modal-body">
        <button onclick="popupclose()" class="uk-modal-close-default" type="button" uk-close></button>
        <img src="{{ asset('frontend/images/boss-bday.png') }}" />
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
