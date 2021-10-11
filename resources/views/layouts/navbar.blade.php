    <div class="navbar navbar-invoiced">
        <div class="container">
            <div class="navbar-header" style="width:100%;">
                <a href="/" class="navbar-brand">
                    Invoice Generator
                </a>            
                @if(Auth::user())
            <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link navbar-brand" style="float:right;">Logout</button>
        </form>
        @else        
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="navbar-brand" style="float:right;">Register</a>
        @endif
        
        @if (Route::has('login'))
        <a href="{{ route('login') }}" class="navbar-brand" style="float:right;">Log in</a>
        @endif
        
        @endif
            </div>
        </div>
        </div>
    </div>



    