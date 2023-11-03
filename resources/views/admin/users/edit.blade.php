<x-admin-layout>
    <x-slot name="header">
        Users
    </x-slot>

    <x-card.default>
        <div class="space-y-6">
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="username" value="Username" />
                    <x-form.input type="text" name="username" id="username" :value="old('username', $user->username)" readonly />
                    <x-form.input-error for="name" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-form.label for="email" value="Email" />
                    <x-form.input type="email" name="email" id="email" :value="old('email', $user->email)" readonly  />
                    <x-form.input-error for="link" class="mt-2" />
                </div>
            </div>

{{--            ROLES--}}
            <div class="mb-6">
                <x-main-layout.heading>Add roles to User</x-main-layout.heading>
            </div>

            <div class="flex flex-wrap">
                @if ($user->roles)
                    @forelse($user->roles as $user_role)
                        <form method="POST" action="{{ route('admin.users.roles.revoke', [$user->id, $user_role->id]) }}" class="flex space-y-2" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                            <x-button.delete class="px-3 py-2 text-xs font-medium mr-2">
                                {{ $user_role->name }}
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
            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}" class="mt-4">
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

{{--            PERMISSIONS--}}
            <div class="mb-6">
                <x-main-layout.heading>Add permissions to User</x-main-layout.heading>
            </div>

            <div class="flex flex-wrap">
                @if ($user->permissions)
                    @forelse($user->permissions as $user_permission)
                        <form method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" class="flex space-y-2" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                            <x-button.delete class="px-3 py-2 text-xs font-medium mr-2">
                                {{ $user_permission->name }}
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
            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}" class="mt-4">
                @csrf
                <div>
                    <x-form.label for="permission" value="Permissions" />
                    <select id="permission"
                            name="permission"
                            autocomplete="permission-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    <x-form.input-error for="permission" class="mt-2" />
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <x-button.primary class="px-3 py-2 text-xs font-medium">Assign</x-button.primary>
                </div>
            </form>
        </div>
    </x-card.default>
</x-admin-layout>
