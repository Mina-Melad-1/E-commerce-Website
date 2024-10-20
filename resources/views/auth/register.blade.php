@include('home.css')

@include('home.header')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<x-guest-layout>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for contrast */
        }

        .form-control:focus {
            border-color: #28a745; /* Focus border color */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Focus glow effect */
        }

        .form-container {
            background: white;
            border: 2px solid #007bff; /* Bootstrap primary color */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .text-danger {
            font-size: 0.9rem; /* Smaller error message text */
        }

        h2 {
            color: #007bff; /* Bootstrap primary color */
        }
    </style>

    <div class="container mt-5">
        <form method="POST" action="{{ route('register') }}" class="form-container">
            @csrf

            <h2 class="text-center mb-4">Sign Up</h2>

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" class="form-label" />
                <x-text-input id="name" class="form-control form-control-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="form-label" />
                <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <x-input-label for="phone" :value="__('Phone')" class="form-label" />
                <x-text-input id="phone" class="form-control form-control-lg" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="Enter your phone number" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
            </div>

            <!-- Address -->
            <div class="mb-4">
                <x-input-label for="address" :value="__('Address')" class="form-label" />
                <x-text-input id="address" class="form-control form-control-lg" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" placeholder="Enter your address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2 text-danger" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="form-label" />
                <x-text-input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                <x-text-input id="password_confirmation" class="form-control form-control-lg" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <a class="text-dark" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="btn btn-primary btn-lg">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
