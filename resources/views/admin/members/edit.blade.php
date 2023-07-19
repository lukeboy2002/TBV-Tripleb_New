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
