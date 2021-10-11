<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Invoice-Generator</title>
    <link href="{{asset('assets/css/vendor.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('assets/css/app.css')}}" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}">
</head>
<body>

<div class="col-md-4">
    
</div>
<div class="container">
    
<div class="papers" style="margin-top:30;">
    @yield ('content')
</div>
    
        
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js" integrity="sha256-RQLbEU539dpygNMsBGZlplus6CkitaLy0btTCHcULpI=" crossorigin="anonymous"></script> 
    <script src="{{asset('assets/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>


    </body>
    </html>