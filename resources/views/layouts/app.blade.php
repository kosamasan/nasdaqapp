<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>XMtest</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/mystyle.css">
    </head>
    <body>
        @include('inc.navbar')

        <div class="container">
            <div class="row">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="js/dateFunction.js"></script>
        <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="js/chartFunction.js"></script>
    </body>
    
</html>