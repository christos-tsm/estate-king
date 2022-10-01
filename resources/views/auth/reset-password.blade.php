<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email" :value="__('Email')" />

                <input id="email" type="email" name="email" :value="old('email', $request - > email)" required
                    autofocus />

                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')" />

                <input id="password" type="password" name="password" required />

                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" :value="__('Confirm Password')" />

                <input id="password_confirmation" type="password" name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div>
                <button>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
