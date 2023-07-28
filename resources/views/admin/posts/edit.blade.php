<x-admin-layout>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    @endpush

    <x-slot name="header">
        Posts
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @method('PATCH')
            @csrf

            <div>
                <x-form.label for="image" value="Featured Image" />
                <x-form.input type="file" name="image" id="image" class="filepond" required  />
                <x-form.input-error for="image" class="mt-2" />
            </div>
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <x-form.label for="title" value="Title" />
                    <x-form.input type="text" name="title" id="title" :value="old('title', $post->title)" required />
                    <x-form.input-error for="name" class="mt-2" />
                </div>
                <div class="w-1/2">
{{--                    @foreach($post->categories as $category)--}}
{{--                        <p class="text-white hidden sm:inline-flex px-1 uppercase">--}}
{{--                            {{ $category->title }}--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
                    <x-form.label for="categories" value="Categories" />
{{--                    <select name="categories[]" multiple="multiple">--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <option value="{{ $category->id }}">{{ $category->title }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                    <select
                        class="js-example-basic-multiple" style="width: 100%"
                        id="categories"
                        name="categories[]"
                        data-placeholder="Select categories..."
                        data-allow-clear="false"
                        multiple="multiple">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <x-form.input-error for="categories" class="mt-2" />
                </div>
            </div>
            <div>
                <x-form.label for="body" value="Text" />
                <x-form.textarea id="body" name="body">{{ old('body', $post->body) }}</x-form.textarea>
                <x-form.input-error for="body" class="mt-2" />
            </div>
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy-mm-dd" value="{{ $post->published_at }} type="text" id="published_at" name="published_at" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Select date">
                    </div>
                </div>
                <div class="w-1/2">
                    <label class="relative inline-flex items-center mr-5 cursor-pointer">
                        <input name="active"
                               id="active"
                               value="1"{{ ($post->active == 1 ? ' checked' : '') }}
                               aria-describedby="active"
                               type="checkbox"
                               class="sr-only peer"
                        >
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
                    </label>
                </div>
            </div>
            <div class="flex justify-end space-x-2">
                <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
                <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
            </div>
        </form>
    </x-card.default>

    @push('scripts')
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
            <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
            <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
            <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
            <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        @php
            $category_ids = [];
        @endphp

        @foreach($post->categories as $category)
            @php
                array_push($category_ids, $category->id);
            @endphp
        @endforeach

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
                        source: '{{ Storage::disk('public')->url($post->image) }}',
                        options: {
                            type: 'local',
                        },
                    }
                ],
            });

            /*Select2 Initlization*/
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
                data = [];
                data = <?php echo json_encode($category_ids); ?>;
                $('.js-example-basic-multiple').val(data);
                $('.js-example-basic-multiple').trigger('change');
            });

            ClassicEditor
                .create(document.querySelector('#body'), {
                    ckfinder: {
                        uploadUrl: '{{ route('admin.upload', ['_token' => csrf_token()]) }}'
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</x-admin-layout>
