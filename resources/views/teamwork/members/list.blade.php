<x-app-layout>

    <x-page-header title="{{ __('Team members') }}" text="{{ __('Manage your team members') }}" />

    <div class="teams__header">

        <h3>Members of team <span>{{ $team->name }}</span></h3>

        <a href="{{ route('teams.index') }}" class="button button__primary button__teams">

            Back

        </a>

    </div>

    <div class="teams__table table__container">

        @foreach ($team->users as $team_member)
            <div class="table__row">

                <div class="table__row--cel">

                    <div class="user-info__avatar teams__avatar">

                        <img class="avatar"
                            src="{{ $team_member->avatar_url ? asset('storage/' . $team_member->avatar_url) : asset('/images/no-image.png') }}"
                            alt="{{ $team_member->first_name . ' ' . $team_member->last_name }}" />

                    </div>

                    <div class="table__inner-col">

                        <h3 class="teams__label-name">{{ $team_member->first_name . ' ' . $team_member->last_name }}
                        </h3>

                        <p class="teams__label-email">{{ $team_member->email }}</p>

                    </div>

                </div>

                <div class="table__row--cel">

                    @if (auth()->user()->isOwnerOfTeam($team))
                        @if (auth()->user()->getKey() !== $team_member->getKey())
                            <form style="display: inline-block;"
                                action="{{ route('teams.members.destroy', [$team, $team_member]) }}" method="post">

                                {!! csrf_field() !!}

                                <input type="hidden" name="_method" value="DELETE" />

                                <x-button class="button__danger button__teams">Delete</x-button>

                            </form>
                        @endif
                    @endif

                </div>

            </div>
        @endforeach

    </div>


    @if (auth()->user()->isOwnerOfTeam($team))

        <div class="teams__header">

            <h3>Pending invitations</h3>

        </div>

        <div class="table__container table__pending-invitations">

            @php
                
                $invites = $team->invites;
                
            @endphp

            @foreach ($invites as $invite)
                <div class="table__row">

                    <div class="table__row--cel">

                        <h4>{{ $invite->email }}</h4>

                    </div>


                    <div class="table__row--cel">

                        <a href="{{ route('teams.members.resend_invite', $invite) }}"
                            class="button button__primary button__teams">

                            Resend invite

                        </a>

                    </div>

                    <div class="table__row--cel">

                        <a href="{{ route('teams.members.deny_invite', $invite) }}"
                            class="button button__danger button__teams">

                            Cancel invite

                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    @endif

    @if (auth()->user()->isOwnerOfTeam($team))
        <div class="panel panel-default">

            <div class="teams__header">

                <h3>Invite to team <span>{{ $team->name }}</span></h3>

            </div>

            <form class="teams__form-horizontal" method="post" action="{{ route('teams.members.invite', $team) }}">

                {!! csrf_field() !!}

                <div class="input__container {{ $errors->has('email') ? ' has-error' : '' }}">

                    <label for="email">E-Mail Address</label>

                    <input type="email" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>
                    @endif

                </div>

                <button type="submit" class="button button__primary button__teams">

                    Invite to Team

                </button>

            </form>

        </div>
    @endif

</x-app-layout>
