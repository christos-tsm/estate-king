@php

$fullname = $user->name;

$fullname = explode(' ', $fullname);

@endphp
<x-app-layout>

    <x-page-header title="{{ __('Profile') }}" text="{{ __('Make changes to your profile') }}" />

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="input__row">

            <!-- First Name -->
            <div class="input__container input__first-name--container">

                <label for="first_name">{{ __('First name') }}</label>

                <input id="first_name" type="text" name="first_name" autocomplete="null" value="{{ $fullname[0] }}"
                    required />

                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />

            </div>

            <!-- Last Name -->
            <div class="input__container input__last-name--container">

                <label for="last_name">{{ __('Last name') }}</label>

                <input id="last_name" type="text" name="last_name" autocomplete="null" value="{{ $fullname[1] }}"
                    required />

                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

            </div>

        </div>


        <!-- Profile picture -->
        <div class="input__row">

            <div class="input__avatar--container">

                <img id="avatar_placeholder"
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('/images/no-image.png') }}"
                    alt="{{ $user->first_name . ' ' . $user->last_name }}">


            </div>

            <div class="input__container input__file--container">

                <input id="avatar_url" type="file" accept=".jpg,.png,.jpeg" name="avatar_url" autocomplete="null" />

                <x-input-error :messages="$errors->get('avatar_url')" />

            </div>

        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="button__primary">

                {{ __('Update Profile') }}

            </x-button>

        </div>



    </form>



</x-app-layout>
