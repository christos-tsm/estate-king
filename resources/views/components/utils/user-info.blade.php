@php

$user = Auth::user();

$user_avatar_url = $user->avatar;

if (str_contains($user_avatar_url, 'avatar.png')):
    $user_avatar_url = str_replace('storage/public/', '', $user_avatar_url);
endif;

@endphp

<div class="user-info__container">

    <div class="user-info__avatar">

        <img src="{{ asset('storage/' . $user_avatar_url) }}" alt="{{ $user->name }}" />

    </div>


    <div class="user-info__details">

        <h3 class="user-info__name">{{ $user->name }}</h3>

        <h4 class="user-info__email">{{ $user->email }}</h4>

    </div>

</div>
