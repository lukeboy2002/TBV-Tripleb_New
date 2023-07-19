<x-admin-layout>
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    @endpush

    <x-slot name="header">
        Members
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.members.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @method('PATCH')
            @csrf
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="username" value="Username" />
                    <x-form.input type="text" name="username" id="username" :value="old('username', $member->username)" readonly />
                    <x-form.input-error for="name" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-form.label for="email" value="Email" />
                    <x-form.input type="email" name="email" id="email" :value="old('email', $member->email)" readonly  />
                    <x-form.input-error for="link" class="mt-2" />
                </div>
            </div>
            <div>
                <x-form.label for="image" value="Image" />
                <x-form.input type="file" name="image" id="image" class="filepond" required  />
                <x-form.input-error for="image" class="mt-2" />
            </div>

            <div class="flex justify-end space-x-2">
                <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
            </div>
        </form>

{{--        ROLES--}}
        <div class="mb-6">
            <x-main-layout.heading>Add roles to User</x-main-layout.heading>
        </div>

        <div class="flex flex-wrap">
            @if ($member->roles)
                @forelse($member->roles as $member_role)
                    <form method="POST" action="{{ route('admin.members.roles.revoke', [$member->id, $member_role->id]) }}" class="flex space-y-2" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')

                        <x-button.delete class="px-3 py-2 text-xs font-medium mr-2">
                            {{ $member_role->name }}
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
        <form method="POST" action="{{ route('admin.members.roles', $member->id) }}" class="mt-4">
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

{{--        PERMISSIONS--}}
        <div class="mb-6">
            <x-main-layout.heading>Add permissions to User</x-main-layout.heading>
        </div>

        <div class="flex flex-wrap">
            @if ($member->permissions)
                @forelse($member->permissions as $member_permission)
                    <form method="POST" action="{{ route('admin.members.permissions.revoke', [$member->id, $member_permission->id]) }}" class="flex space-y-2" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')

                        <x-button.delete class="px-3 py-2 text-xs font-medium mr-2">
                            {{ $member_permission->name }}
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
        <form method="POST" action="{{ route('admin.members.permissions', $member->id) }}" class="mt-4">
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
    </x-card.default>

    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);


            // Get a reference to the file input element
            const inputElement = document.querySelector('#image');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                acceptedFileTypes: ['image/*'],
                server: {
                    load: (source, load, error, progress, abort, headers) => {
                        const myRequest = new Request(source);
                        fetch(myRequest).then((res) => {
                            return res.blob();
                        })
                            .then(load);
                    },
                    process: '{{ route('admin.filepond.upload') }}',
                    revert: '{{ route('admin.filepond.revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                files: [
                    {
                        source: '{{ Storage::disk('public')->url($member->image) }}',
                        options: {
                            type: 'local',
                        },
                    }
                ],
            });
        </script>
    @endpush

</x-admin-layout>
