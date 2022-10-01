@php

$user = Auth::user();

@endphp

<div class="user-info__container">

    <div class="user-info__avatar">

        <img src="{{ $user->avatar_url ? asset('storage/' . $user->avatar_url) : asset('/images/no-image.png') }}"
            alt="{{ $user->first_name . ' ' . $user->last_name }}" />

    </div>


    <div class="user-info__details">

        <h3 class="user-info__name">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</h3>

        <h4 class="user-info__email">{{ $user->email }}</h4>

    </div>

</div>
