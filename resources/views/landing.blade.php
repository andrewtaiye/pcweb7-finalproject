<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trainee Assessment Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Crimson+Pro:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/index.js') }}" defer></script>

    </head>
    <body class="antialiased">
        <main>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <img src="{{ asset('img/logo-short.svg') }}" class="col-md-6"/>
                </div>
                <div class="caption">
                    Trainee Assessment Portal
                </div>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="row">
                        <div class="card col-md-10 col-lg-8 col-xl-6 p-20 font-size-2 justify-content-center">

                            <div class="form-group row align-items-center">
                                <label for="email" class="col-md-4 col-form-label label-login">{{ __('Email: ') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="w-100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <label for="password" class="col-xs-4 col-form-label label-login">{{ __('Password:') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <label class="form-check-label label-login col-xs-4" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 spacer-t-20 justify-content-center">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn-emphasis w-25 mx-2 font-size-1">{{ __('Login') }}</button>
                                    <button type="button" class="btn w-25 mx-2 font-size-1" onclick="window.location.href='{{ route('register') }}'">{{ __('Register') }}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
