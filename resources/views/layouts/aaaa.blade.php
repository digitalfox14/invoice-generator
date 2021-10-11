<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Invoice-Generator</title>
    <link href="{{asset('assets/css/vendor.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('assets/css/app.css')}}" type="text/css" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}">
</head>
<body>
    <div class="navbar navbar-invoiced">
        <div class="container">
            <div class="navbar-header">
                <a href="" class="navbar-brand">
                    Invoice Generator
                </a>
            </div>
        </div>
    </div>
    
    @yield('content')

    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="category-title">Use Invoice Generator</div>
                    <ul>
                        <li>
                            <a href="#">
                                Dummy1
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Dummy2
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Dummy3
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Dummy4
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Dummy5
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <div class="category-title">Education</div>
                    <ul>
                        <li>
                            <a href="#">
                                Dummy1
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Dummy2
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li class="copyright">
                            &copy; 2012-2021 Invoiced, Inc. All rights reserved.
                        </li>
                        <li>
                            <a href="#">
                                Dummy1
                            </a>
                        </li>
                        <li class="made-by">
                            <a href="#" title="Invoiced - Simple online invoicing and payments" target="_blank">
                                Dummy<strong>2</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <form method="post" action="" class="nomargin" id="csv_form" target="_self">
        <input id="csv_json" type="hidden" name="json" />
    </form>
    <form method="post" action="" class="nomargin" id="pdf_form" target="_self">
        <input id="pdf_json" type="hidden" name="json" />
    </form>
    <form method="post" action="" class="nomargin" id="ubl_form" target="_self">
        <input id="ubl_json" type="hidden" name="json" />
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js" integrity="sha256-RQLbEU539dpygNMsBGZlplus6CkitaLy0btTCHcULpI=" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


</body>
</html>