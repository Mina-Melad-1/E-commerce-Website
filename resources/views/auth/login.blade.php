@include('home.css')

@include('home.header')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<x-guest-layout>
    <style>
        .form-control:focus {
            border-color: #28a745; /* Change this to your preferred focus color */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Optional: Adds a glow effect */
        }
    </style>

    <div class="container mt-5">
        <form method="POST" action="{{ route('login') }}" class="bg-light rounded p-5 shadow" style="border: 2px solid #007bff;">
            @csrf
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-danger" :status="session('status')" />

            <h2 class="text-center mb-4 text-dark">Log In</h2>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="form-label" />
                <x-text-input id="email" class="form-control form-control-lg border border-primary" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="form-label" />
                <x-text-input id="password" class="form-control form-control-lg border border-primary" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <!-- Remember Me -->
            <div class="mb-4 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                @if (Route::has('password.request'))
                    <a class="text-dark" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="btn btn-primary btn-lg">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
