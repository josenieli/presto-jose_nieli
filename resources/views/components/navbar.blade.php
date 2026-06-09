<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('ui.navbarBrand') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('ui.toggleNavigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('ui.home') }}</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.welcomeUser', ['name' => Auth::user()->name]) }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('create.article') }}">{{ __('ui.createArticle') }}</a></li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                    {{ __('ui.logout') }}
                                </a>
                            </li>
                        </ul>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">
                            @csrf
                        </form>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('revisor.index') }}"
                                class="nav-link btn btn-outline-success btn-sm position-relative">
                                {{ __('ui.revisorZone') }}
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.helloUser') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">{{ __('ui.allArticles') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-2 ms-lg-auto">
                <button id="theme-toggle" type="button"
                    class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i id="theme-icon" class="fa-solid fa-moon"></i>
                    <span id="theme-text">{{ __('ui.darkMode') }}</span>
                </button>

                <form action="{{ route('article.search') }}" class="d-flex" role="search" method="get">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control"
                            placeholder="{{ __('ui.search') }}" aria-label="{{ __('ui.search') }}">
                        <button type="submit" class="btn btn-outline-success">{{ __('ui.search') }}</button>
                    </div>
                </form>

                <x-_locale lang="it" />
                <x-_locale lang="uk" />
                <x-_locale lang="es" />
            </div>
        </div>
    </div>
</nav>