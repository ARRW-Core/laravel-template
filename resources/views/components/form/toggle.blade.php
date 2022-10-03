@props(['label', 'button_name'])

<div class="flex">
    <label class="form-label inline-block mb-2 text-gray-700">{{ $label }}</label>
    <button type="button"
            class="ml-5 flex-shrink-0 group relative rounded-full inline-flex items-center justify-center h-5 w-10 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            role="switch"
            @click="{!! $button_name .'= !'. $button_name !!}"

            value="10">
        <span aria-hidden="true" class="pointer-events-none absolute bg-white w-full h-full rounded-md"></span>
        <span aria-hidden="true" class="bg-gray-200 pointer-events-none absolute h-4 w-9 mx-auto rounded-full transition-colors ease-in-out duration-200" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-indigo-600': {{$button_name}}, 'bg-gray-200': !({{$button_name}}) }"></span>
        <span aria-hidden="true" class="translate-x-0 pointer-events-none absolute left-0 inline-block h-5 w-5 border border-gray-200 rounded-full bg-white shadow transform ring-0 transition-transform ease-in-out duration-200" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': {{$button_name}}, 'translate-x-0': !({{$button_name}}) }"></span>
    </button>
</div>

