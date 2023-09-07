<header id="#">
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class='container'>
            <a href="/" class="navbar-brand">
                <img style="width: 180px"
                     src="{{asset('assets/logo.png')}}"
                     alt="Klikdom logo"
                />
            </a>

            <button id="openMenu" class="navbar-toggler p-0 border-0 shadow-none">
                <i class="fa-solid fa-bars fs-2 shadow-none" style="color: var(--color-primary)"></i>
            </button>

            <div class="offcanvas offcanvas-end"
                 tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header ps-4 border-bottom">
                    <a href="/" class="navbar-brand">
                        <img style="width: 180px"
                             src="{{asset('assets/logo.png')}}"
                             alt="Klikdom logo"
                        />
                    </a>
                    <button type="button"
                            class="btn-close shadow-none"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close">
                    </button>
                </div>

                <div class="offcanvas-body ms-3">
                    <div class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <ul class="d-lg-flex gap-3 d-none">
                            <li class="nav-item">
                                <a href="{{ route('listing.type') }}" class="nav-link btnPrimary">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    Postavi oglas
                                </a>
                            </li>
                            @if (\Illuminate\Support\Facades\Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle btnOutlineAccent" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Moj profil
                                    </a>
                                    <ul class="dropdown-menu px-3 py-2">
                                        <li><a class="navHover" href="/">Oglasi</a></li>
                                        <li class="py-2"><a class="navHover" href="/">Sačuvani oglasi</a></li>
                                        <li class="py-2"><a class="navHover" href="{{ route('profile.edit') }}">Podešavanja</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="{{ route('logout') }}"
                                                   class="navHover"
                                                   onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                    Odjavi se
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link btnOutlineAccent">Registruj se</a>
                                </li>
                            @endif
                        </ul>
                        @if (!\Illuminate\Support\Facades\Auth::check())
                            <ul class="d-lg-none d-flex border-bottom flex-column gap-3 pb-4 mb-4">
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link btnPrimary text-center">Uloguj se</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link btnAccent text-center">Registruj se</a>
                                </li>
                            </ul>
                        @endif
                        <ul class="d-lg-none d-flex flex-column gap-3 pb-4">
                            <li class="nav-item">
                                <a href="/" class="nav-link navHover">
                                    <i class="fa-solid fa-house me-2"></i>
                                    Naslovna
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('listing.type') }}" class="nav-link navHover">
                                    <i class="fa-solid fa-pen-to-square me-2"></i>
                                    Postavi oglas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/" class="nav-link navHover">Moji oglasi</a>
                            </li>
                            <li class="nav-item">
                                <a href="/" class="nav-link navHover">Sačuvani oglasi</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile.edit') }}" class="nav-link navHover">Podešavanja</a>
                            </li>
                            @if (\Illuminate\Support\Facades\Auth::check())
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                           class="nav-link navHover"
                                           onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            Odjavi se
                                        </a>
                                    </form>
                                </li>
                            @endif
                        </ul>
                        <ul class="d-lg-none d-flex flex-column gap-3 border-top border-bottom py-4">
                            <li>
                                <a href="https://www.facebook.com"
                                   target="/"
                                   class="nav-link navHover">
                                    <i class="fa-brands fa-square-facebook me-2"></i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com"
                                   target="/"
                                   class="nav-link navHover">
                                    <i class="fa-brands fa-instagram me-2"></i>
                                    Instagram
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

