<x-admin-layout>

    <x-slot name="header">
        Sliders
    </x-slot>

    <x-card.default>
        <livewire:admin.slides.edit :slide="$slide" />
    </x-card.default>

</x-admin-layout>
