@php
$themes = [
    'default' => 'Default',
    'light' => 'Light',
    'dark' => 'Dark',
];
@endphp

<x-fieldset>
    @foreach ($themes as $key => $value)
        <label class="flex cursor-pointer items-center gap-2">
            <input
                type="radio"
                name="theme-radios"
                class="radio radio-xs theme-controller"
                value="{{ $key }}"
                @checked ($appearance === $key)
            />
            {{ __($value) }}
        </label>
    @endforeach
</x-fieldset>
