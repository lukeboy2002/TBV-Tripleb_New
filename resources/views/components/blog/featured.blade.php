@props(['post'])

<div class="p-4 border border-gray-200 shadow-md dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <div class="hidden sm:flex space-x-4">
            <div class="flex text-xs text-gray-500">
                <div><i class="fa-regular fa-clock mr-2"></i></div>
                <div>{{ $post->getFormattedDate() }}</div>
            </div>
            <div class="text-xs text-gray-500">
                <i class="fa-regular fa-user mr-2"></i>{{ $post->user->username }}
            </div>
            <div class="text-xs text-gray-500">
{{--                <i class="fa-solid fa-eye mr-2"></i>{{ $post->views->count() }}--}}
                <i class="fa-solid fa-eye mr-2"></i>3
            </div>
            <div class="text-xs text-gray-500">
                {{--                                <i class="fa-solid fa-comments mr-2"></i>{{ $post->comments->count() }}--}}
                <i class="fa-solid fa-comments mr-2"></i>12
            </div>
        </div>
        <div>
            @foreach($post->categories as $category)
                <x-link.category href="{{ route('posts.by-category', $category ) }}" class="hidden sm:inline-flex mx-1 uppercase">
                    {{ $category->title }}
                </x-link.category>
            @endforeach
        </div>
    </div>
    <a href="#">
    <a href="{{ route('posts.show', $post->slug) }}">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
    </a>
    <div class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
        {!! $post->shortBody() !!}
    </div>
</div>
<a href="{{ route('posts.show', $post->slug) }}">
    <img class="mx-auto max-h-96 w-full object-cover" src="{{ asset($post->getImage() )}}" alt="{{ $post->title }}">
</a>
{{--<div class="p-5 text-sm md:flex md:justify-between md:items-center">--}}
{{--    <p class="text-gray-500"><i class="fa-solid fa-comments mr-2"></i>{{ $post->comments->count() }} comment(s)</p>--}}
{{--    <div class="flex items-center space-x-5 pt-4 lg:pt-0">--}}
{{--        <p class="text-orange-500">Share</p> <x-menus.social />--}}
{{--    </div>--}}
{{--</div>--}}
