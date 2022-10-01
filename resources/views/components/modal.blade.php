<div x-cloak x-data="{ on: false }">
    {{ $trigger }}

    <div class="fixed inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center" x-show="on">
        <div
            class="fixed inset-0 transition-opacity"
            x-show="on"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div @click="on = false" class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
             role="dialog"
             aria-modal="true"
             aria-labelledby="modal-headline"
             x-show="on"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
{{--                    <div--}}
{{--                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">--}}
{{--                        {{ $icon }}--}}
{{--                    </div>--}}
                    <div class="my-3 text-center sm:flex-auto sm:text-left">
                        <div class="flex justify-center">
                            <h2 class="text-xl bold leading-6 font-medium text-gray-900">
                                {{ $title }}
                            </h2>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm leading-5 text-gray-500">
                                {{ $slot }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
