
<x-section.form submit="save">
    <x-slot name="title">
        Player Information
    </x-slot>

    <x-slot name="description">
        Additional information for players.
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <div class="space-y-6">
                <div wire:ignore>
                    <x-form.label for="bio" value="Biography" />
                    <x-form.textarea id="bio" name="bio" wire:model.defer="bio"></x-form.textarea>
                    <x-form.input-error for="bio" class="mt-2" />
                </div>

                <div class="flex justify-between gap-6">
                    <div class="w-1/2">
                        <div class="col-span-6 sm:col-span-4">
                            <x-form.label for="city" value="City" />
                            <x-form.input id="city" type="text" class="mt-1 block w-full" wire:model="city" />
                            <x-form.input-error for="email" class="mt-2" />
                        </div>
                    </div>
                    <div class="w-1/2">
                        <x-form.label for="birthday" value="Birthday" />
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" wire:model="birthday" type="text" id="birthday" name="birthday" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-white dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Select date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="flex items-center space-x-2">
            <x-messages />
            <x-button.primary class="px-3 py-2 text-xs font-medium">
                Save
            </x-button.primary>
        </div>


    </x-slot>
</x-section.form>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        var ready = (callback) => {
            if (document.readyState != "loading") callback();
            else document.addEventListener("DOMContentLoaded", callback);
        }
        ready(() =>{
            ClassicEditor
                .create(document.querySelector('#bio'), {
                    ckfinder: {
                        uploadUrl: '{{ route('admin.player.upload', ['_token' => csrf_token()]) }}'
                    }
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('bio', editor.getData());
                    })
                    Livewire.on('reinit', () => {
                        editor.setData('', '')
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        })

        document.getElementById("birthday").addEventListener("changeDate", function (e) {
            Livewire.emit('changeDate', e.detail.datepicker.inputField.value)
        });
    </script>
@endpush
