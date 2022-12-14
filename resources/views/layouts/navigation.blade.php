<nav class="navigation__container">

    <div class="navigation__links-container">

        <!-- Navigation Links -->
        <ul class="navigation__links">

            <li class="navigation__links-single">

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">

                    <x-icons.dashboard />

                    {{ __('Dashboard') }}

                </x-nav-link>

            </li>

            <li class="navigation__links-single">

                <x-nav-link :href="route('teams.index')" :active="request()->routeIs('teams.*')">

                    <x-icons.agents />

                    {{ __('Teams') }}

                </x-nav-link>

            </li>

            <li class="navigation__links-single navigation__links-single--messages">

                <x-nav-link :href="route('messages')" :active="request()->routeIs('messages')">

                    <x-icons.messages />

                    {{ __('Messages') }}

                </x-nav-link>

            </li>

            <li class="navigation__links-single">

                <x-nav-link :href="route('reports')" :active="request()->routeIs('reports')">

                    <x-icons.reports />

                    {{ __('Reports') }}

                </x-nav-link>

            </li>

            <li class="navigation__links-single">

                <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')">

                    <x-icons.settings />

                    {{ __('Settings') }}

                </x-nav-link>

            </li>

            <li class="navigation__links-single">

                <x-nav-link :href="route('support')" :active="request()->routeIs('support')">

                    <x-icons.support />

                    {{ __('Support') }}

                </x-nav-link>

            </li>

        </ul>

    </div>

</nav>
