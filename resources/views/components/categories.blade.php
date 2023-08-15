<div class="w-full border border-gray-700 dark:border-gray-700 mb-2 p-2">
    <div class="p-4">
        @foreach ($categories as $category)
            <x-link.category href="{{ route('post.by-category', $category ) }}" class="p-1 block uppercase">
                {{ $category->title }} ({{ $category->total }})
            </x-link.category>
        @endforeach
    </div>
</div>

