<x-guest-layout>

    <x-auth-card>

        <x-slot name="logo">

            <x-application-logo />

        </x-slot>

        <div class="auth-intro-text__container">

            <p>{{ __('Already registered?') }}

                <a class="link link__auth" href="{{ route('login') }}">{{ __('Login here.') }}</a>

            </p>

        </div>

        <form method="POST" action="{{ route('register') }}" class="auth__form auth__form--login">

            @csrf

            @if (session('invite_token'))
                <input type="hidden" name="invitation_token" value="{{ session('invite_token') }}">
            @endif
            <div class="input__row">

                <!-- Name -->
                <div class="input__container input__name--container">

                    <label for="first_name">{{ __('First name') }}</label>

                    <input autocomplete="null" id="first_name" type="text" name="first_name"
                        value="{{ old('first_name') }}" required autofocus />

                    <x-input-error :messages="$errors->get('first_name')" />

                </div>

                <div class="input__container input__name--container">

                    <label for="last_name">{{ __('Last name') }}</label>

                    <input autocomplete="null" id="last_name" type="text" name="last_name"
                        value="{{ old('last_name') }}" required autofocus />

                    <x-input-error :messages="$errors->get('last_name')" />

                </div>

            </div>

            <!-- Email Address -->
            <div class="input__container input__email--container">

                <label for="email">{{ __('Email') }}</label>

                <input id="email" type="email" name="email" value="{{ old('email') }}" required />

                <x-input-error :messages="$errors->get('email')" />

            </div>

            <!-- Password -->
            <div class="input__container input__password--container">

                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" />

            </div>

            <!-- Confirm Password -->
            <div class="input__container input__password--container">

                <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                <input id="password_confirmation" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" />

            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="button__primary">

                    {{ __('Register') }}

                </x-button>

            </div>

        </form>

    </x-auth-card>

</x-guest-layout>
