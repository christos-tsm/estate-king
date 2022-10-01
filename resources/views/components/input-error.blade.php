@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'message__error']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
