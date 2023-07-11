@props(['comment'])

    <div class="mb-2 flex bg-white rounded-lg border shadow-md md:flex-row dark:border-gray-700 dark:bg-gray-800">
        <div class="h-20 w-20">
            <img class="object-cover h-20 w-20 rounded-t-lg md:w-20 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/' .$comment->user->profile_photo_path) }}" alt="">
        </div>
        <div class="px-4 leading-normal w-full">
            <p class="flex justify-end text-orange-500 text-xs pt-1">{{ $comment->created_at->format('m-d-Y')}} by {{ $comment->user->username }}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">{{ $comment->comment }}</p>
        </div>
    </div>

