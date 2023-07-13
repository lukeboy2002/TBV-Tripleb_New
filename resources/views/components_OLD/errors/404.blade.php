<section class="flex items-center h-full p-16">
    <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
        <div class="max-w-md text-center">
            <h2 class="mb-8 font-extrabold text-9xl text-orange-500">
                <span class="sr-only">Error</span>404
            </h2>
            <p class="text-2xl font-semibold md:text-3xl text-gray-700 dark:text-white">Sorry, we couldn't find this page.</p>
            <p class="mt-4 mb-8 dark:text-gray-400">But dont worry, you can find plenty of other things on our homepage.</p>
            {{ $slot }}
        </div>
    </div>
</section>
