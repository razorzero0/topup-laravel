@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-md font-bold text-red-600 ']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
