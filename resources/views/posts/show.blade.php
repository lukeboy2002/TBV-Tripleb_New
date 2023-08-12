<x-app-layout>
    <div class="relative w-full bg-white dark:bg-gray-800 overflow-hidden">
        <div class="relative float-left w-full">
            <img
                src="{{ asset($post->getImage() )}}"
                class="block w-full h-96 object-center object-cover"
                alt="$slide->title"
            />
            <div class="absolute inset-0 h-full text-center">
                <div class="flex flex-col h-full items-center justify-center">
                    <h5 class="text-2xl font-black text-orange-500 uppercase">Blog post</h5>
                    <p class="text-xl font-bold text-black">{{ $post->title }}</p>
                </div>
            </div>
        </div>
    </div>

    <x-blog.grid>
        <x-slot name="blog">
            <x-main-layout.heading>In the Spotlight</x-main-layout.heading>
            <div class="py-4">

                <x-card.default class="sm:p-6 md:p-8">
                    <div class="flex justify-end mb-4">
                        @foreach($post->categories as $category)
{{--                            <x-links.category href="{{ route('post.by-category', $category ) }}" class="hidden sm:inline-flex px-1 uppercase">--}}
                            <x-link.category href="#" class="hidden sm:inline-flex px-1 uppercase">
                                #{{ $category->title }}
                            </x-link.category>
                        @endforeach
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h2>

                    <div class="sm:flex items-center sm:space-x-6 sm:mb-4">
                        <div class="font-normal text-gray-700 dark:text-gray-400">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . $post->user->profile_photo_path) }}" class="h-15 w-15 mr-2 rounded-full border dark:border-gray-700" alt="avatar">
{{--                                <x-links.default href="{{ route('explore.show', $post->user->username) }}"--}}
                                <x-link.primary href="#" class="text-gray-900 dark:text-white hover:text-orange-500 dark:hover:text-orange-500 focus:text-orange-500 focus:dark:text-orange-500 focus:underline">{{ $post->user->username }}</x-link.primary>
                            </div>
                        </div>
                        <div class="sm:h-4 flex items-center space-x-4 sm:border-l sm:border-orange-500">
                            <div class="ml-0 sm:ml-3 text-xs text-gray-500">
                                <i class="fa-regular fa-clock mr-2"></i>{{ $post->getFormattedDate() }}
                            </div>
                            <div class="text-xs text-gray-500 py-4">
{{--                                <i class="fa-regular fa-eye mr-2"></i>{{ $post->views->count() }}--}}
                                <i class="fa-regular fa-eye mr-2"></i>2
                            </div>
                            <div class="text-xs text-gray-500 py-4">
{{--                                <i class="fa-solid fa-comments mr-2"></i>{{ $post->comments->count() }}--}}
                                <i class="fa-solid fa-comments mr-2"></i>12
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 text-gray-900 dark:text-white prose dark:prose-invert">
                        {!! $post->body !!}
                    </div>
                </x-card.default>

            </div>
        </x-slot>
        <x-slot name="side">
            <div class="hidden md:block">
                <x-main-layout.heading>Hot news</x-main-layout.heading>
                <div class="py-4">
                    <x-popular-posts />
                </div>
            </div>

            <div class="hidden md:block">
                <x-main-layout.heading>Categories</x-main-layout.heading>
                <div class="py-4">

                </div>
            </div>

        </x-slot>
    </x-blog.grid>













</x-app-layout>
