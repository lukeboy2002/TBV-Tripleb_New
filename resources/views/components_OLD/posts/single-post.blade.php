@props(['post'])

<article {{ $attributes->merge(['class' => 'bg-white border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700']) }}>
    <div class="relative">
        <a href="{{ route('post.show', $post->slug) }}">
            <img class="mx-auto max-h-52 w-full object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
        </a>
        <div class="absolute bg-orange-500 block h-16 mr-4 right-0 text-center text-lg text-white top-0 w-16">
            <p class="text-3xl font-extrabold">{{ $post->published_at->format('d') }}</p>
            <p class="text-sm">{{ $post->published_at->format('M') }}</p>
        </div>
    </div>
    <div class="p-5">
        <div class="mb-4">
            @foreach($post->categories as $category)
                <x-links.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex mx-1 uppercase">
                    #{{ $category->title }}
                </x-links.category>
            @endforeach
        </div>

        <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-5/6">
            <a href="{{ route('post.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </div>
        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {!! $post->shortBody() !!}
        </div>
        <footer class="hidden sm:block space-y-2">
            <div class="flex items-center space-x-2">
                <div class="text-xs text-gray-500">
                    <i class="fa-regular fa-clock mr-2"></i>{{ $post->getFormattedDate() }}
                </div>
                <div class="text-xs text-gray-500">
                    <i class="fa-regular fa-user mr-2"></i>{{ $post->user->username }}
                </div>
                <div class="text-xs text-gray-500">
                    {{--                <i class="fa-solid fa-comments ml-4 mr-2"></i>{{ $post->comments->count() }}--}}
                    <i class="fa-solid fa-comments mr-2"></i>10
                </div>
            </div>
        </footer>

    </div>
</article>
