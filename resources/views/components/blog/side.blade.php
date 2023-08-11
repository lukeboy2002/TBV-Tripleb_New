@props(['post'])

<div class="w-full border border-gray-700 dark:border-gray-700 mb-2 p-2">
    <div class="flex justify-between items-center mb-4">
        <div class="text-xs text-gray-500">
            <i class="fa-regular fa-clock mr-2"></i>{{ $post->published_at->diffForHumans() }}
        </div>
        <div class="text-xs text-gray-500">
            <i class="fa-solid fa-eye mr-2"></i>{{ $post->views->count() }}
        </div>
    </div>


    <div class="sm:flex sm:justify-between sm:space-x-2 md:block lg:flex lg:justify-between lg:space-x-2">
        <a href="#" class="w-full sm:w-1/3 lg:w-1/3">
            <img src="{{ asset($post->getImage() )}}" alt="{{$post->title}}"/>
        </a>
        <div class="sm:hidden lg:hidden flex justify-end space-x-2 my-2 md:flex ">
            @foreach($post->categories as $category)
{{--                <x-link.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex mx-1">--}}
                <x-link.category href="#">
                    #{{ $category->title }}
                </x-link.category>
            @endforeach
        </div>
        <div class="w-full sm:w-2/3 md:w-full md:pr-1">
            <a href="#">
                <h3 class="text-md font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h3>
            </a>
            <div class="hidden md:hidden sm:pt-2 sm:pb-4 sm:flex sm:justify-end sm:space-x-2 lg:pt-2 lg:pb-4 lg:flex lg:justify-end lg:space-x-2 ">
                @foreach($post->categories as $category)
{{--                    <x-link.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex mx-1">--}}
                    <x-link.category href="#">
                        #{{ $category->title }}
                    </x-link.category>
                @endforeach
            </div>
            <div class="mb-3 text-xs font-normal text-gray-700 dark:text-gray-400">
                {!! $post->shortBody(20) !!}
            </div>
        </div>
    </div>
</div>

{{--<div class="grid grid-cols-4 gap-2 border border-gray-700 dark:border-gray-700 mb-2 p-2">--}}
{{--    <div class="col-span-4">--}}
{{--        <div class="flex justify-between items-center">--}}
{{--            <div class="text-xs text-gray-500">--}}
{{--                <i class="fa-regular fa-clock mr-2"></i>{{ $post->published_at->diffForHumans() }}--}}
{{--            </div>--}}
{{--            <div class="text-xs text-gray-500">--}}
{{--                <i class="fa-solid fa-eye mr-2"></i>{{ $post->views->count() }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <a href="#" class="col-span-1 pt-1">--}}
{{--        <img src="{{ asset($post->getImage() )}}" alt="{{$post->title}}"/>--}}
{{--    </a>--}}
{{--    <div class="col-span-3">--}}
{{--        <a href="#">--}}
{{--            <h3 class="text-md font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h3>--}}
{{--        </a>--}}
{{--        <div class="flex mb-2">--}}
{{--            @foreach($post->categories as $category)--}}
{{--                <x-link.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex mx-1">--}}
{{--                <x-link.category href="#" class="hidden sm:inline-flex mx-1">--}}
{{--                    #{{ $category->title }}--}}
{{--                </x-link.category>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="mb-3 text-xs font-normal text-gray-700 dark:text-gray-400">--}}
{{--            {!! $post->shortBody(10) !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
