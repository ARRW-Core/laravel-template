@props(['label' => '', 'name', 'type' => 'text', 'placeholder' => '', 'required' => false, 'autofocus' => false])


<div :class="'{{$type}}' != 'hidden' ? 'flex-auto' : ''" {{ $attributes }}>
    <div :class="'{{$type}}' != 'hidden' ? 'mb-3 xl:w-96' : ''">
        <label for="{{ $name }}" :class="'{{$type}}' != 'hidden' ? 'form-label inline-block mb-2 text-gray-700' : ''">{{ $label }}</label>
        <input
            {{ $attributes }}
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            :class="'{{$type}}' != 'hidden' ? 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none' : ''"
            placeholder="{{ $placeholder }}"
            :required="{{ $required ? 'true' : 'false' }}"
            :autofocus="{{ $autofocus ? 'true' : 'false' }}"
        />
    </div>
</div>

