@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-700 font-bold rounded-sm border-b-4 border-red-600 space-y-1 bg-red-100 py-2 px-4']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
