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
                <p class="subtitle">Step into Your Internship Journey - Sign up to Get Started</p>
            </div>
        </div>

        <form action="" method="POST">
            @csrf
            <div class="form-header">
                <h1>Create an account</h1>
            </div>

            <div class="col-input">

                <div class="row-input">
                    <input type="text" class="first-name" placeholder="First name">
                    <input type="text" class="last-name" placeholder="Last name">
                </div>

                <input type="number" class="hours-input" placeholder="Internship Duration (hr)">
                <input type="text" class="pass-input" placeholder="Confirm password">
                <input type="password" class="pass-input" placeholder="Password">
                <input type="password" class="pass-input" placeholder="Confirm password">


                <button type="submit">Sign up</button>
            </div>

            <p class="signup-text">Already have an account? 
                <a href="{{ route('home') }}" class="signup-redirect"> Sign in</a> here</p>

        </form>
    </main>

    @include('partials.footer')
</body>
</html>