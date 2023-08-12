<x-app-layout>
    <div class="w-full bg-white dark:bg-gray-800 mb-6">
        <div class="relative w-full bg-white dark:bg-gray-800 overflow-hidden">
            <div class="relative float-left w-full">
                <img
                    src="{{ asset('storage/backgrounds/blog.jpg') }}"
                    class="block w-full h-64 sm:h-64 md:h-64 object-center object-cover"
                    alt="$slide->title"
                />
                <div class="absolute inset-0 h-full text-center">
                    <div class="flex flex-col h-full items-center justify-center">
                        <h5 class="text-3xl font-black text-orange-500 uppercase">TripleB post</h5>
                    </div>
                </div>
            </div>
        </div>

        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-6">
            <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
                <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                    Blog
                </div>
            </div>
            @if ($posts->count())
                <div class="mt-4 md:grid md:grid-cols-6 md:gap-4">
                    @foreach ($posts as $post)
                        <x-blog.single-post
                            :post="$post"
                            class="md:col-span-3 lg:col-span-2 mt-4 lg:mt-0"
                        />
                    @endforeach
                </div>
                <div class="py-6">
                    {{ $posts->links() }}
                </div>
            @else
                <x-error.404>
                    <x-link.btn-primary href="{{ route('posts.index') }}" class="px-3 py-2 text-xs font-medium">
                        Back to news
                    </x-link.btn-primary>
                </x-error.404>
            @endif
        </section>
    </div>
</x-app-layout>
