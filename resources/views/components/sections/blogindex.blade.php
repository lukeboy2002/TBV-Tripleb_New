<div class="w-full bg-white dark:bg-gray-800 mb-6">
    <div class="container max-w-6xl mx-auto py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="col-span-2">
                <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
                    <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                        Laatste nieuws
                    </div>
                </div>
                <x-latest-post />
            </div>
            <div>
                <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
                    <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                        Popular Post
                    </div>
                </div>
                <x-popular-posts />
            </div>
        </div>
    </div>
</div>
