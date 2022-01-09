<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}" />
    <link href="{{ asset('css/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datatables/buttons.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    @yield('styles')

    <title>{{ $title ?? 'Chinese' }}</title>
  </head>
  <body>
    
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="{{ URL::to('/vocabulary') }}" class="nav-link px-2 link-dark">Vocabulary</a></li>
                    
                    @if(Auth::check())
                        @if(Auth::user()->email == "jesusherrera13@gmail.com")
                            <li><a href="{{ URL::to('/units') }}" class="nav-link px-2 link-dark">Units</a></li>
                        @endif
                    @endif
                    <li><a href="#" class="nav-link px-2 link-dark">HSK </a></li>
                </ul>

                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form> -->

                <div class="dropdown text-end me-3">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/'.session()->get('language_code').'.png') }}" alt="mdo" width="32" >
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        @foreach(session()->get('languages') as $language)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ URL::to('/language-selection/'.$language->id) }}">
                                <img src="{{ asset('img/'.$language->code.'.png') }}" alt="mdo" width="32" >
                                <span style="margin-left: 5px">
                                    {{ $language->name }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        @if(Auth::check())
                        <form method="POST" action="/logout">
                            @csrf
                            <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
                            <input type="submit" class="dropdown-item" href="/logout" value="Sign out">
                        </form>
                        @else
                        <li><a class="dropdown-item" href="{{ URL::to('login') }}">Log in</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    @yield('scripts')
  </body>
</html>