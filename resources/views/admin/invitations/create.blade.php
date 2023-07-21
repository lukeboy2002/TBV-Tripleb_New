<x-admin-layout>
    <x-slot name="header">
        Invitations
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.invitations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <x-form.label for="email" value="Email" />
                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-form.input-error for="email" class="mt-2" />
            </div>
{{--            <div>--}}
{{--                <x-form.input id="invited_by" class="block mt-1 w-full" type="hidden" name="invited_by" :value="current_user()->username" readonly required />--}}
{{--            </div>--}}

            <div class="flex justify-end space-x-2">
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
            </div>
        </form>
    </x-card.default>

    <x-card.default class="mt-4">
        <livewire:admin.invitations.all />
    </x-card.default>
</x-admin-layout>
