@props (['messages'])

@if ($messages)
    <ul class="text-error text-xs">
        @foreach ((array)$messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
