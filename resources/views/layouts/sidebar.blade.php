<aside class="aside__container">

    <div class="aside__logo--container">

        <a href="{{ route('dashboard') }}" aria-label="Dashboard link">
            <x-application-logo />
        </a>

    </div>

    <x-utils.user-info />

    @include('layouts.navigation')

    <div class="aside__logout--container navigation__links-container">

        <ul class="navigation__links">

            <li class="navigation__links-single">

                <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">

                    <x-icons.agents />

                    {{ __('Profile') }}

                </x-nav-link>

            </li>


            <li class="navigation__links-single">

                <form class="aside__logout" method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button onclick="event.preventDefault(); this.closest('form').submit();">

                        <x-icons.logout />

                        {{ __('Log Out') }}

                    </button>

                </form>

            </li>

        </ul>

    </div>

</aside>
