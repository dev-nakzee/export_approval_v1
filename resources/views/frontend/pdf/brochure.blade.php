<!DOCTYPE html>
<html>
    <head>
        <title>Brochure</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            a, abbr, acronym, address, big, cite, code,
            del, dfn, em, img, ins, kbd, q, s, samp,
            small, strike, strong, sub, sup, tt, var,
            b, u, i, center,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, embed, 
            figure, figcaption, footer, header, hgroup, 
            menu, nav, output, ruby, section, summary,
            time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }
            /* HTML5 display-role reset for older browsers */
            article, aside, details, figcaption, figure, 
            footer, header, hgroup, menu, nav, section {
                display: block;
            }
            body {
                line-height: 1;
            }
            ol, ul {
                list-style: none;
            }
            blockquote, q {
                quotes: none;
            }
            blockquote:before, blockquote:after,
            q:before, q:after {
                content: '';
                content: none;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            @page {
                size:    A4 portrait;
                margin-top: 15mm !important;
            }
            .page-break {
                display: block; 
                page-break-before: always;
            }
            body {
                width:   210mm;
                height:  297mm;
            }
            .brandliaison {
                margin-top: 90mm;
            }
            .brandliaison img {
                height: 70px;
            }
            .service-description {
                font-size: 30px !important;
                font-weight: bold !important;
                color: #000;
            }
            .middle-text {
                margin-top: 50mm;
            }
        </style>
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>
    </head>
    
    <body>
        <div class="uk-section uk-margin-remove uk-padding-large uk-text-center">
            <img class="uk-margin-xlarge-bottom" src="https://ik.imagekit.io/bimma/exportapproval/logo.png?updatedAt=1703831191033">
            <h3 class="uk-text-bold middle-text">Enabling your products for export to India</h3>
            <h2 class="uk-margin-top uk-margin-remove-bottom uk-h2 uk-text-bold">Obtain {{$data['service']['service_name']}}</h2>
            <div class="service-description">{!!$data['service']['service_description']!!}</div>
            <div class="uk-position-bottom brandliaison">
                <span class="uk-text-bold uk-text-small">Powered By</span><br>
                <img src="https://ik.imagekit.io/bimma/exportapproval/bl-logo-hq.jpg?updatedAt=1703831190940">
            </div>
        </div>
        <div class="page-break"></div>
        <div class="uk-section uk-margin-remove uk-padding-large">
            <div class="uk-container">
            {!!$data['sections']['page2']!!}
            </div>
        </div>
        <div class="page-break"></div>
        <div class="uk-section uk-margin-remove uk-padding-large">
            <div class="uk-container">
            {!!$data['sections']['page3']!!}
            </div>
        </div>
        <div class="page-break"></div>
        <div class="uk-section uk-margin-remove uk-padding-large">
            <div class="uk-container">
                <h2 class="uk-h3 uk-text-bold uk-margin-remove-bottom">{{$data['service']['service_name']}} : Mandatory Product Categories</h2>
                <table class="uk-table uk-table-small uk-table-striped uk-table-divider" style="border: 1px #ccc solid">
                    <thead>
                        <tr>
                            <th class="uk-text-bold">Sr. No.</th>
                            <th class="uk-text-bold">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['products'] as $product)
                        <tr>
                            <td>{{$loop->iteration}} </td>
                            <td>{{$product->product_category_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="uk-section uk-margin-remove uk-padding-large">
            <div class="uk-container">
                <h3 class="uk-h3 uk-text-bold">About Brand Liaison</h3>
                <p class="uk-h4 uk-text-justify">Brand Liaison, founded in 2014, is one of the top 10 compliance consultant company, registered with the ROC (Registrar of Companies), Ministry of Corporate Affairs, Government of India. With the Export Approval platform, we offer comprehensive assistance and support to foreign manufacturers aiming to export their products to India seamlessly. Our team of compliance experts streamlines the process of obtaining essential approvals and certifications necessary for a diverse range of products. Brand Liaison understands the challenges of Indian compliance services and serves as a trusted partner in navigating these complexities. We provide tailored solutions for various product certifications crucial for market entry. Our expertise lies in facilitating a smooth and efficient approval process, ensuring that foreign manufacturers meet all regulatory standards and enabling them to establish a strong presence in the Indian market. We have established enduring partnerships with over 150 renowned global brands. These collaborations represent our ability to meet diverse needs and exceed expectations successfully. Though our esteemed clientele is extensive, we wish to highlight some of our partners, including Aquilstar, C-net, CBS Chemicals, CCDT, Desko, Exza, HID, Hitachi, Jjiuzhou, Willet, QNAP, Secure-VU, Samsung-STS, Skyworth, and many more.</p>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="uk-section uk-margin-remove uk-padding-large">
            <div class="uk-container uk-text-center">
                <h4 class="uk-h3 uk-text-bold">This Brochure is created for</h4>
                <p class="uk-h4 uk-text-bold">{{$data['name']}}<br>
                {{$data['organisation']}}<br>
                {{$data['email']}}<br>
                {{$data['phone']}}<br>
                {{$data['country']}}
                </p>
            </div>
        </div>
    </body>
</html>