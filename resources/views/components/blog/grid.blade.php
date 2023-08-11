<div class="max-w-6xl mx-auto flex flex-wrap py-6">
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col px-3">
        {{ $blog }}
    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col px-3">
        {{ $side ?? '' }}
    </aside>
</div>
