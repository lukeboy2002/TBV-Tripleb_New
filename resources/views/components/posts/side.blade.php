@props(['post'])

<div class="grid grid-cols-4 gap-2 border border-gray-700 dark:border-gray-700 mb-2 p-2">
    <div class="col-span-4">
        <div class="flex justify-between items-center">
            <div class="text-xs text-gray-500">
                <i class="fa-regular fa-clock mr-2"></i>{{ $post->published_at->diffForHumans() }}
            </div>
            <div class="text-xs text-gray-500">
                <i class="fa-solid fa-eye mr-2"></i>{{ $post->views->count() }}
            </div>
        </div>
    </div>

    <a href="#" class="pt-1">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{$post->title}}"/>
    </a>
    <div class="col-span-3">
        <a href="#">
            <h3 class="text-md font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h3>
        </a>
        <div class="flex mb-2">
            @foreach($post->categories as $category)
                <x-links.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex mx-1">
                    #{{ $category->title }}
                </x-links.category>
            @endforeach
        </div>
        <div class="mb-3 text-xs font-normal text-gray-700 dark:text-gray-400">
            {!! $post->shortBody(10) !!}
        </div>
    </div>
</div>
