@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css"/>
@endpush
    <form wire:submit.prevent="save" enctype="multipart/form-data" method="POST" class="space-y-6">
        @csrf
        <div>
            <x-form.label for="image" value="Image" />
            <x-form.input wire:model="image" name="image" type="file" required />
                <div wire:loading wire:target="image"></div>
            <x-form.input-error for="image" class="mt-2" />
        </div>
        <div>
            <x-form.label for="title" value="Title" />
            <div class="flex space-x-2">
                <x-form.input wire:model="title" type="text" name="title" required />
                <input wire:model="color_title" type="text" name="color_title" class="w-20 rounded-lg text-white" style="background-color: {{ $color_title }}" data-coloris />
            </div>
            <x-form.input-error for="title" class="mt-2" />
        </div>
        <div>
            <x-form.label for="subtitle" value="Subtitle" />
            <div class="flex space-x-2">
                <x-form.input wire:model="subtitle" type="text" name="subtitle" required />
                <input wire:model="color_subtitle" type="text" name="color_subtitle" class="w-20 rounded-lg text-white" style="background-color: {{ $color_subtitle }}"data-coloris />
            </div>
            <x-form.input-error for="subtitle" class="mt-2" />
        </div>
        <div>
            <label class="relative inline-flex items-center mr-5 cursor-pointer">
                <input wire:model="active"
                       name="active"
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
        <fieldset class="hidden md:block border border-orange-500 rounded-md px-3 py-2 shadow-sm ">
            <legend class="mt-1 text-md px-4 text-gray-900 dark:text-white">Preview</legend>
            <div class="bg-gray-50 dark:bg-gray-700 h-96">
                <div class="relative w-full overflow-hidden">
                    <div class="relative float-left w-full">
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}"
                                 class="block w-full max-h-96 object-center object-cover"
                                 alt="Preview"
                            >
                        @else
                            <div class="block w-full h-96"></div>
                        @endif
                        <div class="absolute inset-0 h-full hidden md:block text-center">
                            <div class="flex flex-col h-full items-center justify-center">
                                <h5 class="text-4xl font-black" style="color: {{ $color_title }}">{{ $title }}</h5>
                                <p class="text-xl font-semibold" style="color: {{ $color_subtitle }}">{{ $subtitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="flex justify-end space-x-2">
            <x-button.secondary type="button" onclick="history.back()" class="px-3 py-2 text-xs font-medium">Cancel</x-button.secondary>
            <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
        </div>
    </form>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
@endpush
