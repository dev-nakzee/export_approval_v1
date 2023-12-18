<section class="uk-box-shadow-medium brochure-section uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical" id="download-brochure">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
        <p class="section-heading uk-margin-remove-bottom">
            Download Brochure
        </p>
        <span class="section-tagline">Process &amp; Guidelines</span>
    </div>
    <div id="download-brochure-error-success">
        @if(Session::has('message'))
        <div class="uk-margin-small uk-width-1-1">
            <div class="uk-alert-success" uk-alert>
                <a href class="uk-alert-close" uk-close></a>
                <p>{{Session::get('message') }}</p>
            </div>
        </div>
        @endif
    </div>
    <form class="uk-form-stacked uk-padding" id="brochure-form" method="POST" action="{{route('frontend.site.brochure.store')}}">
        @csrf
        <div uk-grid>
            <div class="uk-width-1-2@m">
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="fullname" id="fullname" type="text" placeholder="Your Name">
                </div>
            </div>
            <div class="uk-width-1-2@m">
      
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="organisation" id="organisation" type="text" placeholder="Organisation name">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="email" id="email" type="email" placeholder="Email address">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical form-inputs" id="country" name="country" style="font-size: 12px;">
                        <option value="">Select Country</option>
                        @if($countries)
                        @foreach($countries as $country)
                        <option value="{{json_encode([$country->name, $country->phonecode])}}">{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                        @endforeach
                        @endif
                    </select>
                    <input class="uk-input form-inputs uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="mobile number">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="service" name="service">
                        <option value="">Select Service</option>
                        @if($services)
                        @foreach($services as $service)
                        <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="source" name="source">
                        <option value="">How did you find us?</option>
                        <option value="Website">Website</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Referral">Referral</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="uk-width-1-1@m uk-margin-small-top">    

                <div class="uk-form-controls">
                    <textarea name="message" class="uk-textarea" placeholder="Enter you query along with product details"></textarea>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                    <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                    <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                    <input class="uk-input uk-width-expand form-inputs uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <button class="uk-border-rounded uk-button uk-button-primary brochure-form-submit" type="submit">Submit</button>
                <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
            </div>
        </div>
    </form>
</section>
<script>
 function captcha(){
    var x = Math.floor((Math.random() * 9) + 1);
    var y = Math.floor((Math.random() * 9) + 1);
    var canvas = document.getElementById("captcha_image");
    var ctx=canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "Blue";
    ctx.textAlign = "center";
    ctx.font = "12px Arial";
    ctx.strokeText(x+" + "+y+"   =",60,20);
    var answer = document.getElementById("captcha_answer");
    answer.value = x + y;
}
$(document).on("click", "#reload_captcha", function(){
    captcha();
});
$(document).ready(function(){
    captcha();
});
$(document).on("submit", "#brochure-form", function(e) {
    e.preventDefault();
    formData = $('#brochure-form').serialize();
    var inputs = Array.from(document.getElementsByClassName('form-inputs'));
    inputs.forEach(field => {
        field.classList.remove('form-error');
    });
    $('.loading').removeClass('uk-hidden');
    $error = 0;
    if($('#fullname').val() === '') {
        $('#fullname').addClass('form-error');
        $('#fullname').attr("placeholder", "Please enter full name");
        $error = 1;
    }
    if($('#organisation').val() === '') {
        $('#organisation').addClass('form-error');
        $('#organisation').attr("placeholder", "Please enter an organisation name");
        $error = 1;
    }
    if($('#email').val() === '') {
        $('#email').addClass('form-error');
        $('#email').attr("placeholder", "Please enter email address");
        $error = 1;
    }
    if($('#country').val() === '') {
        $('#country').addClass('form-error');
        $('#country').attr("placeholder", "Select country");
        $error = 1;
    }
    if($('#mobile').val() === '') {
        $('#mobile').addClass('form-error');
        $('#mobile').attr("placeholder", "Please enter phone number");
        $error = 1;
    }
    if($('#service').val() === '') {
        $('#service').addClass('form-error');
        $('#service').attr("placeholder", "Please select a service");
        $error = 1;
    }
    if($('#source').val() === '') {
        $('#source').addClass('form-error');
        $('#source').attr("placeholder", "Please select a source");
        $error = 1;
    }
    if($('#captcha').val() === '') {
        $('#captcha').addClass('form-error');
        $('#captcha').attr("placeholder", "Please enter a captcha");
        $error = 1;
    }
    if($('#captcha').val() != $('#captcha_answer').val()) {
        $('#captcha').addClass('form-error');
        $('#captcha').val('');
        captcha();
        $('#captcha').attr("placeholder", "Incorrect captcha");
        $error = 1;
    }
    if($error === 0) {
        e.currentTarget.submit()
    }

    fetch(e.currentTarget.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        setTimeout(function () { location.reload(1); }, 12500);
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
    
});
</script>