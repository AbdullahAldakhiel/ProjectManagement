<div>
<section class="menu cid-rK4vQaPwUo" once="menu" id="menu1-5">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        @if (Route::has('login'))

        <div class="menu-logo">
            <div class="navbar-brand">

                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="https://mobirise.co">
                        Project Management
                    </a>
                </span>
            </div>
        </div>
                 @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{ url('/home') }}">
                    Dashboard
                    </a>
                </li>
                @else


            </ul>
            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-4" href="{{ route('login') }}">
                    Login
                </a>
            </div>
            @if (Route::has('register'))
            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-4" href="{{ route('register') }}">
                    Register
                </a>
            </div>
            @endif
            @endauth
        </div>
@endif

    </nav>
</section>
</div>
