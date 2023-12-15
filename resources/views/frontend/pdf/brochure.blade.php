Explain
<!DOCTYPE html>
<html>
    <head>
        <title>Brochure</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>
    </head>
    <body>
        <div class="uk-section">
            <div class="uk-container">
                <table class="uk-table">
                    <tr>
                        <td>
                            <img src="https://bl-india.com/logo/img/logo-700x175.jpg" style="height: 70px;">
                        </td>
                        <td class="uk-text-right uk-text-small"><strong>Brand Liaison India Pvt. Ltd.</strong><br>
                            110, Sharma Complex<br>
                            A-2, Guru Nanak Pura, Laxmi Nagar<br>
                            Delhi - 110092, India<br>
                            +91-9810363988<br>
                            info@bl-india.com<br>
                            https://two.exportapproval.com</td>
                    </tr>
                </table>
            </div>
            <div class="uk-container">
                @if($data)
                <p>To,<br>
                {{$data['name']}}<br>
                {{$data['country']}}</p>
                @endif
            </div>
            <div class="uk-container uk-margin-bottom">
                <h2 class="uk-heading-bullet uk-text-center uk-margin-remove-bottom">{{$data['service']['service_name']}}</h2>
                <span class="uk-text-center">{!!$data['service']['service_description']!!}</span>
            </div>
            @foreach($data['sections'] as $sections)
            <div class="uk-container">
                <h3 class="uk-heading-divider">{{$sections['service_section_name']}}</h3>
                <div>
                    {!! $sections['service_section_content']!!}
                </div>
            </div>
            @endforeach
            <div class="uk-container">
                <h3 class="uk-heading-divider">{{'Frequently Asked Questions'}}</h3>
                @foreach(json_decode($service->faqs, true) as $que=>$ans)
                    <span class="uk-text-emphasis uk-text-bolder">{{$loop->iteration}}. {{$que}}</span>
                    <div class="uk-text-emphasis uk-margin-bottom">
                        {{ $ans }}
                    </div>
                @endforeach
            </div>

        </div>
    </body>
</html>