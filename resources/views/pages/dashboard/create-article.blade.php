<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>
    <div class="flex">
        <aside class="w-80 m-3" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 border border-gray-200">
                <ul class="space-y-2">
                    <li>
                        <x-modal.add-new-media></x-modal.add-new-media>
                    </li>
                </ul>
            </div>
        </aside>
        <aside class="w-full my-3 mr-3" aria-label="Sidebar">
            <x-form action="{{ route('store-article') }}">
                <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 border border-gray-200">
                    {{--                Title--}}
                    <div class="flex flex-col">
                        <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                        <input type="text" id="title" name="title" class="w-full text-2xl bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    {{--                Body--}}
                    <div class="flex flex-col mt-4">
                        <label for="body" class="leading-7 text-sm text-gray-600">Body</label>
                        <textarea id="body" name="body" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <x-slot name="button1" label="Preview">
                    <span class="flex-auto w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button type="submit"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Submit
                        </button>
                    </span>
                </x-slot>
                <x-slot name="button2">
                    <span class="mt-3 flex-auto w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Preview
                        </button>
                    </span>
                </x-slot>
            </x-form>
        </aside>
    </div>

</x-dashboard-layout>
