@if (Route::has('register'))
    <div class="navbar navbar-invoiced">
        <div class="container">
            <div class="navbar-header" style="width:100%;">
                <a href="/" class="navbar-brand">
                    Invoice Generator
                </a>            
                <a href="{{ route('register') }}" class="navbar-brand" style="float:right;">Register</a>
                @endif
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="navbar-brand" style="float:right;">Log in</a>
                @endif
        
            </div>
        </div>
        </div>
    </div>



    
    <form method="POST" action="{{ route('logout') }}">
@csrf
<button type="submit" class="btn btn-link navbar-brand">Logout</button>
</form>