<x-admin-layout>
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    @endpush

    <x-slot name="header">
        Members
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="username" value="Username" />
                    <x-form.input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-form.input-error for="username" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-form.label for="email" value="Email" />
                    <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-form.input-error for="email" class="mt-2" />
                </div>
            </div>
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="password" value="Password" />
                    <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-form.input-error for="password" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-form.label for="password_confirmation" value="Confirm Password" />
                    <x-form.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-form.input-error for="password_confirmation" class="mt-2" />
                </div>
            </div>
            <div>
                <x-form.label for="image" value="Image" />
                <x-form.input type="file" name="image" id="image" required  />
                <x-form.input-error for="image" class="mt-2" />
            </div>
            <div class="flex justify-end space-x-2">
                <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
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
                    process: '{{ route('admin.filepond.upload') }}',
                    revert: '{{ route('admin.filepond.revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endpush

</x-admin-layout>
