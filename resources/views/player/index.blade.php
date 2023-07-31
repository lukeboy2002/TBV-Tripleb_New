<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 mx-4 px-4">
        <div class="grid grid-cols-1 gap-x-8 gap-y-10 pb-12 sm:grid-cols-4">
            <div class="grid grid-cols-1 sm:col-span-3">
                <livewire:playeroverview />
            </div>
            <div class="side">
                <x-ranking />
            </div>
        </div>
    </div>
</x-app-layout>
