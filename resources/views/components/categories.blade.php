<div class="pt-6 pb-3">
    <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
        <p class="text-orange-500 font-black uppercase">Categorie&euml;n</p>
    </div>
</div>

<x-cards.default>
    <div class="p-4">
        <div class="flex flex-wrap w-full justify-start">
            @foreach ($categories as $category)
                <x-links.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex p-1 uppercase">
                    #{{ $category->title }}
                </x-links.category>
            @endforeach
        </div>
    </div>
</x-cards.default>
