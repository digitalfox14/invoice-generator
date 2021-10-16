<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Invoice-Generator</title>
    <link href="{{asset('assets/css/vendor.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('assets/css/app.css')}}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('layouts.navbar')
    <div class="scrollable">
        <div class="container">
            <div id="static" class="invoice-holder clearfix">
                    <div class="invoice-controls desktop">
                        <div class="btns clearfix">
                            <p>
                                <button type="button" class="btn btn-primary btn-lg btn-block" id="downloadInvoice">
                                    Download Invoice
                                </button>
                            </p>
                        </div>
                    </div>
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>
        </div>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js" integrity="sha256-RQLbEU539dpygNMsBGZlplus6CkitaLy0btTCHcULpI=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js" integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>