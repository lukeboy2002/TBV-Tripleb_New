@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 20rem;
            object-fit: cover;
        }

        .swiper-pagination-bullet-active {
            background: #f97316;
        }

        .swiper-button-next,.swiper-button-prev {
            color: #f97316;
        }
    </style>

@endpush
<div class="w-full bg-white dark:bg-gray-800 my-6">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-6">
        <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
            <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                Our Team
            </div>
        </div>

        {{--        <div class="pt-2 border-b border-gray-200 dark:border-gray-600"></div>--}}

        <div class="swiper mySwiper mt-4">
            <div class="swiper-wrapper pb-12">
                @foreach($members as $member)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/'.$member->profile_picture) }}">
                        <div class="absolute bottom-0 w-full" >
                            <div class="bg-orange-500 h-10 flex justify-center items-center">
                                <p class="text-white font-black">{{$member->username}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endpush

