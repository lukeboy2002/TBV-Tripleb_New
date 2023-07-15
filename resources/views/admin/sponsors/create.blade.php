<x-admin-layout>
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    @endpush

    <x-slot name="header">
        Sponsors index
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="name" value="Name" />
                    <x-form.input type="text" name="name" id="name" :value="old('name')" required autofocus />
                    <x-form.input-error for="name" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-form.label for="link" value="Website URL" />
                    <x-form.input type="url" name="link" id="link" :value="old('link')" required  />
                    <x-form.input-error for="link" class="mt-2" />
                </div>
            </div>
            <div>
                <x-form.label for="image" value="Image" />
                <x-form.input type="file" name="image" id="image" required  />
                <x-form.input-error for="image" class="mt-2" />
            </div>
            <div>
                <label class="relative inline-flex items-center mr-5 cursor-pointer">
                    <input name="active"
                           id="active"
                           value="1"
                           aria-describedby="active"
                           type="checkbox"
                           class="sr-only peer"
                           checked
                    >
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
                </label>
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
