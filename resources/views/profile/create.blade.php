<x-app-layout>
    <div class="min-h-fit flex">
        <div class="hidden lg:block relative w-0 flex-1 h-screen">
            <img class="absolute inset-0 h-full w-full object-cover opacity-60 dark:opacity-80" src="{{asset('storage/backgrounds/register.jpeg')}}" alt="">
        </div>

        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <x-logo />
                    <h2 class="mt-6 text-3xl font-bold tracking-tight text-orange-500">Complete your invitation</h2>
                </div>
                <div class="my-8">
                    <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" id="invited_by" name="invited_by" value="{{ $invitation->invited_by }}">
                        <div>
                            <x-form.label for="username" value="Username" />
                            <x-form.input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                            <x-form.input-error for="username" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-form.label for="email" value="{{ __('Email') }}" />
                            <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $email)" required autocomplete="email" />
                            <x-form.input-error for="email" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-form.label for="password" value="{{ __('Password') }}" />
                            <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            <x-form.input-error for="password" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-form.label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-form.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-form.input-error for="password_confirmation" class="mt-2" />
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-form.label for="terms">
                                    <div class="flex items-center">
                                        <x-form.checkbox name="terms" id="terms" required />
                                        <div class="ml-2">
                                            I agree to the
                                            <x-link.primary class="underline" href="{{ route('terms.show') }}">Terms of Service</x-link.primary>
                                            and
                                            <x-link.primary class="underline" href="{{ route('policy.show') }}">Privacy Policy</x-link.primary>
                                        </div>
                                    </div>
                                </x-form.label>
                            </div>
                        @endif
                        <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Register</x-button.primary>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
