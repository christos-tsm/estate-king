@php

$user = Auth::user();

@endphp

<div class="user-info__container">

    <div class="user-info__avatar">

        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" />

    </div>


    <div class="user-info__details">

        <h3 class="user-info__name">{{ $user->name }}</h3>

        <h4 class="user-info__email">{{ $user->email }}</h4>

    </div>

</div>
