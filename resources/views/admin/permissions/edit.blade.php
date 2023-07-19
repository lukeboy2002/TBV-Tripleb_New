<x-admin-layout>
    <x-slot name="header">
        Permissions
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @method('PATCH')
            @csrf
            <div>
                <x-form.label for="name" value="Name" />
                <x-form.input type="text" name="name" id="name" :value="old('name', $permission->name)" required autofocus />
                <x-form.input-error for="name" class="mt-2" />
            </div>

            <div class="flex justify-end space-x-2">
                <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
            </div>
        </form>

        <div class="mb-6">
            <x-main-layout.heading>Add roles to permission</x-main-layout.heading>
        </div>
        <div class="flex flex-wrap">
            @if ($permission->roles)
                @forelse($permission->roles as $permission_role)
                    <form method="POST" action="{{ route('admin.permissions.roles.revoke', [$permission->id, $permission_role->id]) }}" class="flex space-y-2" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')

                        <x-button.delete class="px-3 py-2 text-xs font-medium mr-2">
                            {{ $permission_role->name }}
                        </x-button.delete>

                    </form>
                @empty
                    <div class="flex justify-center items-center w-full">
                        <div class="flex flex-col justify-center items-center h-40 space-y-4">
                            <div class="text-orange-500"><i class="fa-regular fa-circle-xmark fa-2xl"></i></div>
                            <p class="text-xl font-bold tracking-tight text-gray-700 dark:text-white">No records found</p>
                        </div>
                    </div>
                @endforelse
            @endif
        </div>
        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}" class="mt-4">
            @csrf
            <div>
                <x-form.label for="role" value="Roles" />
                <select id="role"
                        name="role"
                        autocomplete="role-name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-form.input-error for="permission" class="mt-2" />
            </div>
            <div class="flex justify-end space-x-2 mt-4">
                <x-button.primary class="px-3 py-2 text-xs font-medium">Assign</x-button.primary>
            </div>
        </form>
    </x-card.default>
</x-admin-layout>
