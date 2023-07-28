<x-admin-layout>

    <x-slot name="header">
        Categories
    </x-slot>

    <x-card.default>
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @method('PATCH')
            @csrf
            <div>
                <x-form.label for="title" value="Title" />
                <x-form.input type="text" name="title" id="title" :value="old('title', $category->title)" required autofocus />
                <x-form.input-error for="title" class="mt-2" />
            </div>
            <div>
                <label class="relative inline-flex items-center mr-5 cursor-pointer">
                    <input name="active"
                           id="active"
                           value="1"{{ ($category->active == 1 ? ' checked' : '') }}
                           aria-describedby="active"
                           type="checkbox"
                           class="sr-only peer"
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
</x-admin-layout>
