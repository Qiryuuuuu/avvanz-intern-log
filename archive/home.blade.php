<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avvanz Inc.</title>
    @vite('resources/css/home.css')
    @vite('resources/js/splashAnimation.js')
</head>
<body class="initial">
    <div class="splash">
        <img id="avvanz-logo" class="avvanz-logo" src="{{ asset('images/avvanz-logo.png') }}" alt="Avvanz Inc. Logo">
    </div>
    
    <main>
        <div class="main-content">
            <div class="header-content">
                <img class="home-logo" src="{{ asset('images/avvanz-logo.png') }}" alt="Avvanz Inc. Logo">
                <h1 class="header-title">Internship Log</h1>
            </div>
            <div class="header-subtitle">
                <p class="subtitle">Step into Your Internship Journey - Sign in to Get Started</p>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="form-header">
                    <h1>Sign in</h1>
                </div>

                <div class="col-input">

                    <input type="text" class="email-input" placeholder="Email">
                    <input type="password" class="pass-input" placeholder="Password">

                    <button type="submit">Sign in</button>
                </div>

                <p class="signup-text">Don't have an account yet? 
                    <a href="{{ route('signup') }}" class="signup-redirect"> Sign up</a> here</p>
            </form>
        </div>

    </main>

    @include('partials.footer')
</body>
</html>