<div class="w-full bg-white dark:bg-gray-800 my-6">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-6">
        <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
            <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                Upcoming events
            </div>
        </div>
        <div class="mt-6">
            <div class="w-full bg-white dark:bg-gray-800">
                @foreach($events as $event)
                    <div class="block sm:flex sm:space-x-6">
                        <div class="sm:hidden">
                            <h1 class="text-center text-5xl text-orange-500 font-extrabold ">{{ $event->title }}</h1>
                        </div>
                        <div class="text-center mb-4 sm:mt-4">
                            <div class="flex justify-center sm:block items-center space-x-4">
                                <div class="text-gray-700 dark:text-white font-black">{{ $event->getweekday() }}</div>
                                <p class="text-xl text-orange-500 font-extrabold">{{ $event->geteventDate() }}</p>
                            </div>
                            <p class="block sm:hidden text-orange-500"> <i class="fa-solid fa-location-dot mr-2"></i> {{ $event->location }}</p>
                        </div>
                        <div class="mb-4 sm:m-0">
                            <img class="sm:max-h-56 object-top object-cover rounded-lg w-full" src="{{ $event->image }}" alt="">
                        </div>
                        <div class="hidden sm:block pl-5">
                            <h1 class="text-5xl text-orange-500 font-extrabold ">{{ $event->title }}</h1>
                            <p class="text-orange-500 mb-4"> <i class="fa-solid fa-location-dot mr-2"></i> {{ $event->location }}</p>
                            <div class="font-normal text-gray-700 dark:text-white prose dark:prose-invert">{!! $event->body !!}</div>
{{--                            <p class="font-normal text-gray-700 dark:text-white prose dark:prose-invert">{!! $event->shortBody() !!}</p>--}}
{{--                            <div class="mt-4">--}}
{{--                                <x-links.btn-primair href="#" class="px-5 py-2.5 text-sm font-medium">more</x-links.btn-primair>--}}
{{--                            </div>--}}
                        </div>
                        @if($event->body)
                            <div class="sm:hidden font-normal text-gray-700 dark:text-white prose dark:prose-invert">{!! $event->shortBody() !!}</div>

                            {{--                        <div class="flex justify-center mb-4 sm:hidden">--}}
{{--                            <x-links.btn-primair href="#" class="px-5 py-2.5 text-sm font-medium w-full">more</x-links.btn-primair>--}}
{{--                        </div>--}}
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
