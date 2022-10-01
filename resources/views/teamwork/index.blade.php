<x-app-layout>

    <x-page-header title="{{ __('Teams') }}" text="{{ __('Manage your teams and your team members') }}" />

    <a class="button button__primary" href="{{ route('teams.create') }}">

        {{ __('Create new team') }}

    </a>


    <div class="table__container">

        @foreach ($teams as $team)
            <div class="table__row">

                <div class="table__row--cel">

                    <h3 class="table__label-team-name">{{ $team->name }}</h3>

                </div>

                <div class="table__row--cel">

                    @if (auth()->user()->isOwnerOfTeam($team))
                        <span class="table__label table__label-owner">{{ __('Owner') }}</span>
                    @else
                        <span class="table__label">{{ __('Member') }}</span>
                    @endif

                </div>

                @if (is_null(auth()->user()->currentTeam) ||
                    auth()->user()->currentTeam->getKey() !== $team->getKey())
                    <div class="table__row--cel">

                        <a href="{{ route('teams.switch', $team) }}" class="table__link">

                            {{ __('Switch to primary') }}

                        </a>

                    </div>
                @endif

                <div class="table__row--cel">

                    <a href="{{ route('teams.members.show', $team) }}" class="table__link">

                        {{ __('Members') }}

                    </a>

                </div>

                @if (auth()->user()->isOwnerOfTeam($team))
                    <div class="table__row--cel">

                        <a href="{{ route('teams.edit', $team) }}" class="table__link">

                            {{ __('Edit') }}

                        </a>


                        <form action="{{ route('teams.destroy', $team) }}" method="post">

                            {!! csrf_field() !!}

                            <input type="hidden" name="_method" value="DELETE" />

                            <x-button class="button__danger"> {{ __('Delete') }} </x-button>

                        </form>

                    </div>
                @endif

            </div>
        @endforeach

    </div>

</x-app-layout>
