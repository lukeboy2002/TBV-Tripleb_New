<x-admin-layout>
    <x-slot name="header">
        Roles
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <x-form.label for="name" value="Name" />
                <x-form.input type="text" name="name" id="name" :value="old('name')" required autofocus />
                <x-form.input-error for="name" class="mt-2" />
            </div>
            <div class="flex justify-end space-x-2">
                <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
            </div>
        </form>
    </x-card.default>
</x-admin-layout>
