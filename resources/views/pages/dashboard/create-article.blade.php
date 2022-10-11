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
        <main class="w-full my-3 mr-3" aria-label="Sidebar">
            <x-form action="{{ route('store-article') }}">
                <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 border border-gray-200">
                    {{--                Title--}}
                    <div class="flex flex-col">
                        <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                        <input type="text" id="title" name="title" class="w-full text-2xl bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old('title') }}">
                    </div>
                    {{--                Body--}}
                    <div class="flex flex-col mt-4">
                        <label for="body" class="leading-7 text-sm text-gray-600">Body</label>
                        <textarea id="body" name="body" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('body') }}</textarea>
                    </div>

                    <div class="flex flex-col mt-4">
                        <input id="categories" name='categories' placeholder='Select categories from the list' value="{{ old('categories') }}">
                        <script>
                            var input1 = document.getElementById('categories')
                            var tagify = new Tagify(input1, {
                                whitelist: {!! json_encode($categories) !!},
                                dropdown: {
                                    maxItems: 20,           // <- mixumum allowed rendered suggestions// <- custom classname for this dropdown, so it could be targeted
                                    enabled: 0,             // <- show suggestions on focus
                                    closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                                }
                            })
                            tagify.on('change', console.log)
                        </script>
                    </div>
                    <div class="flex flex-col mt-4">
                        <input id="tags" name='tags' placeholder='Select tags from the list' value="{{ old('tags') }}">
                        <script>
                            var input2 = document.getElementById('tags')
                            var tagify = new Tagify(input2, {
                                whitelist: {!! json_encode($tags) !!},
                                dropdown: {
                                    maxItems: 20,           // <- mixumum allowed rendered suggestions// <- custom classname for this dropdown, so it could be targeted
                                    enabled: 0,             // <- show suggestions on focus
                                    closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
                                }
                            })
                            tagify.on('change', console.log)
                        </script>
                    </div>
{{--                    images--}}
                    <div class="flex flex-col mt-4">
                        <label for="images" class="leading-7 text-sm text-gray-600">Images</label>
                        <div class="">
                            @if (isset($images))
                                <x-form.input name="images_count" type="hidden" value="{{count($images)}}"></x-form.input>
                                @foreach($images as $key => $image)
                                    <div class="max-w-sm w-full lg:max-w-full lg:flex">
                                        <div class="h-64 lg:h-64 lg:w-64 flex-none border-gray-400 lg:border-l lg:border-t lg:border-gray-400 bg-contain bg-no-repeat bg-center rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{!str_contains($image['uri'], 'temp/images') ? $image['uri'] : asset('storage/'.$image['uri'])}}')" title="Woman holding a mug"></div>
                                        <x-form.input name="image_uri{{$key}}" type="hidden" value="{{ $image['uri'] }}"></x-form.input>
                                        <div class="flex-1 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                            <div class="mb-8" {!! 'x-data="{is_cover_toggle_'.$key.': '.$image['is_cover'].'}"' !!}>
                                                <x-form.input label="Caption" name="caption{{$key}}" type="text" value="{{$image['caption']}}"></x-form.input>
                                                <x-form.input label="Alt" name="alt{{$key}}" type="text" value="{{$image['alt']??''}}"></x-form.input>
                                                <x-form.toggle label="Is Cover Image?" button_name="{!! 'is_cover_toggle_'.$key !!}"></x-form.toggle>
                                                <x-form.input label="" name="is_cover{{$key}}" type="hidden" x-bind:value="{!! 'is_cover_toggle_'.$key !!}"></x-form.input>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
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
        </main>
    </div>

</x-dashboard-layout>
