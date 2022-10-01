<x-app-layout>

    <x-page-header title="{{ __('Edit team') }}" text="{{ __('Manage your team') }}" />

    <div class="teams__header">

        <h3>Edit team <span>{{ $team->name }}</span></h3>

        <a href="{{ route('teams.index') }}" class="button button__primary button__teams">

            Back

        </a>

    </div>

    <form class="teams__form-horizontal" method="post" action="{{ route('teams.update', $team) }}">

        <input type="hidden" name="_method" value="PUT" />

        {!! csrf_field() !!}

        <div class="input__container {{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name', $team->name) }}">

            @if ($errors->has('name'))
                <span class="help-block">

                    <strong>{{ $errors->first('name') }}</strong>

                </span>
            @endif

        </div>

        <button type="submit" class="button button__primary button__teams">

            Save

        </button>

    </form>



</x-app-layout>
