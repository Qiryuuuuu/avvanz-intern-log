@extends('layouts.auth')

@section('title', 'Home - Login')

@section('content')

    <div class="splash">
        <img id="avvanz-logo" class="avvanz-logo" src="{{ asset('images/avvanz-logo.png') }}" alt="Avvanz Inc. Logo">
    </div>

    <main>
        <div class="main-content visible">
            <div class="header-content">
                <img class="home-logo" src="{{ asset('images/avvanz-logo.png') }}" alt="Avvanz Inc. Logo">
                <h1 class="header-title">Internship Log</h1>
            </div>
            <div class="header-subtitle">
                <p class="subtitle">Step into Your Internship Journey - Sign up to Get Started</p>
            </div>

            <!-- Laravel Form Starts -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-header">
                    <h1>Create an account</h1>
                </div>

                <div class="col-input">
                    <!-- First & Last Name -->
                    <div class="row-input">
                        <div style="width: 100%;">
                            <input type="text" name="first_name" class="first-name" placeholder="First name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="width: 100%;">
                            <input type="text" name="last_name" class="last-name" placeholder="Last name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <input type="email" name="email" class="email-input" placeholder="Email Address" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Internship Hours -->
                    <input type="number" name="to_render" class="hours-input" placeholder="Internship Duration (hr)" value="{{ old('to_render') }}" required>
                    @error('to_render')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Password -->
                    <input type="password" name="password" class="pass-input" placeholder="Password" required>
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Confirm Password -->
                    <input type="password" name="password_confirmation" class="pass-input" placeholder="Confirm password" required>
                    @error('password_confirmation')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit" class="login-button">Sign up</button>
                </div>

                <p class="signup-text">Already have an account? 
                    <a href="{{ route('login') }}" class="signup-redirect">Sign in</a> here</p>
            </form>
        </div>
    </main>
@endsection