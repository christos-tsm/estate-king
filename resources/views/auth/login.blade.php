<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/"> --}}
            <x-application-logo />
            {{-- </a> --}}
        </x-slot>

        <div class="auth-intro-text__container">
            <p>
                {{ __("Don't have an account?") }}
                <a class="link link__auth" href="{{ route('register') }}">{{ __('Create one here.') }}</a>
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="auth__form auth__form--login">
            @csrf

            <!-- Email Address -->
            <div class="input__container input__email--container">

                <label for="email">{{ __('Email') }}</label>

                <input id="email" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input__container input__password--container">

                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="input__remember--container">

                <input id="remember_me" type="checkbox" name="remember">

                <label for="remember_me">{{ __('Remember me') }}</label>

            </div>

            <div class="submit__container">
                @if (Route::has('password.request'))
                    <a class="link link__auth" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="button__primary">
                    {{ __('Log in') }}
                </x-button>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
