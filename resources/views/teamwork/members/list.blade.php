<x-app-layout>

    <x-page-header title="{{ __('Team members') }}" text="{{ __('Manage your team members') }}" />

    <div class="panel panel-default">

        <div class="teams__header">

            <h3>Members of team <span>{{ $team->name }}</span></h3>

            <a href="{{ route('teams.index') }}" class="button button__primary">

                Back

            </a>

        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>Name</th>

                        <th>Action</th>

                    </tr>

                </thead>

                @foreach ($team->users as $team_member)
                    <tr>

                        <td>{{ $team_member->first_name . ' ' . $team_member->last_name }}</td>

                        <td>

                            @if (auth()->user()->isOwnerOfTeam($team))
                                @if (auth()->user()->getKey() !== $team_member->getKey())
                                    <form style="display: inline-block;"
                                        action="{{ route('teams.members.destroy', [$team, $team_member]) }}"
                                        method="post">

                                        {!! csrf_field() !!}

                                        <input type="hidden" name="_method" value="DELETE" />

                                        <x-button class="button__danger">Delete</x-button>

                                    </form>
                                @endif
                            @endif

                        </td>

                    </tr>
                @endforeach

            </table>

        </div>

    </div>

    <div class="panel panel-default">

        <div class="panel-heading clearfix">Pending invitations</div>

        <div class="panel-body">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>E-Mail</th>

                        <th>Action</th>

                    </tr>

                </thead>

                @foreach ($team->invites as $invite)
                    <tr>

                        <td>{{ $invite->email }}</td>

                        <td>

                            <a href="{{ route('teams.members.resend_invite', $invite) }}"
                                class="btn btn-sm btn-default">

                                <i class="fa fa-envelope-o"></i> Resend invite

                            </a>

                        </td>

                    </tr>
                @endforeach

            </table>

        </div>

    </div>


    <div class="panel panel-default">

        <div class="panel-heading clearfix">Invite to team "{{ $team->name }}"</div>

        <div class="panel-body">

            <form class="form-horizontal" method="post" action="{{ route('teams.members.invite', $team) }}">

                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <label class="col-md-4 control-label">E-Mail Address</label>



                    <div class="col-md-6">

                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">



                        @if ($errors->has('email'))
                            <span class="help-block">

                                <strong>{{ $errors->first('email') }}</strong>

                            </span>
                        @endif

                    </div>

                </div>





                <div class="form-group">

                    <div class="col-md-6 col-md-offset-4">

                        <button type="submit" class="btn btn-primary">

                            <i class="fa fa-btn fa-envelope-o"></i>Invite to Team

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
