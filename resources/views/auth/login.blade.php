@extends('layouts.auth')

@section('title', 'Home - Login')

@section('content')
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

            <!-- Session Status -->
            @if (session('status'))
                <div class="text-green-600 text-sm mb-2 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-header">
                    <h1>Sign in</h1>
                </div>

                <div class="col-input">
                    <input type="email" name="email" class="email-input" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <input type="password" name="password" class="pass-input" placeholder="Password" required>
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    
                    <button type="submit" class="login-button">Sign in</button>
                </div>

                <p class="signup-text">Don't have an account yet?
                    <a href="{{ route('register') }}" class="signup-redirect">Sign up</a> here
                </p>
            </form>
        </div>
    </main>

@endsection
