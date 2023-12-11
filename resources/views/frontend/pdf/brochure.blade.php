Explain
<!DOCTYPE html>
<html>
    <head>
        <title>Brochure</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body>
        <div class="uk-section">
            <div class="uk-container">
                @if($data)
                <p>To,<br>
                {{$data['name']}}<br>
                {{-- {{$data->country}}</p> --}}
                @endif
            </div>
            <div class="uk-container">

            </div>
        </div>
    </body>
</html>