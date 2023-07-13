<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center bg-lime-600 border border-transparent rounded-md text-white hover:bg-lime-500 active:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
