<section class="mb-5">
    <header class="mb-4">
        <h2 class="h4 fw-bold text-dark">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-muted mb-0">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mb-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="firstName" class="form-label">{{ __('First Name') }}</label>
            <input id="firstName" name="first_name" type="text" class="form-control" 
                   value="{{ old('first_name', $user->first_name) }}" required autofocus autocomplete="firstName">
            @error('first_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input id="last_name" name="last_name" type="text" class="form-control" 
                   value="{{ old('last_name', $user->last_name) }}" required autocomplete="lastName">
            @error('last_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="to_render" class="form-label">{{ __('To Render') }}</label>
            <input id="to_render" name="to_render" type="text" class="form-control" 
                   value="{{ old('to_render', $user->to_render) }}" required autocomplete="toRender">
            @error('to_render')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted mb-2">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link p-0 text-decoration-none">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-2 mb-0">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <div class="text-muted" id="status-message">
                    {{ __('Saved.') }}
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('status-message').style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>