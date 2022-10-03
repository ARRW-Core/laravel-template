<x-modal title="Add New Media" submit-label="Submit">
    <x-slot name="trigger">
        <div @click="on = true" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="20">
                <path d="M176 392C167.164 392 160 384.836 160 376V96H40.201C17.998 96 0 113.998 0 136.201V407.799C0 430.002 17.998 448 40.201 448H289.973C295.877 422.895 315.514 402.57 342.283 392H176ZM104 384C104 388.418 100.418 392 96 392H64C59.582 392 56 388.418 56 384V352C56 347.582 59.582 344 64 344H96C100.418 344 104 347.582 104 352V384ZM104 288C104 292.418 100.418 296 96 296H64C59.582 296 56 292.418 56 288V256C56 251.582 59.582 248 64 248H96C100.418 248 104 251.582 104 256V288ZM104 192C104 196.418 100.418 200 96 200H64C59.582 200 56 196.418 56 192V160C56 155.582 59.582 152 64 152H96C100.418 152 104 155.582 104 160V192ZM618.941 160.834L410.941 230.166C404.408 232.344 400 238.459 400 245.346V417.697C394.857 416.699 389.559 416 384 416C348.654 416 320 437.49 320 464S348.654 512 384 512C419.348 512 448 490.51 448 464V319L592 271V353.697C586.857 352.699 581.559 352 576 352C540.654 352 512 373.49 512 400S540.654 448 576 448C611.348 448 640 426.51 640 400V176.012C640 165.092 629.301 157.379 618.941 160.834ZM301.334 256H368V245.346C368 224.652 381.189 206.354 400.822 199.809L505.521 164.91L463.541 101.937C461.066 98.227 456.904 96 452.447 96C447.988 96 443.824 98.227 441.354 101.938L389.068 180.361L370.441 154.812C367.93 151.367 363.926 149.334 359.668 149.334S351.406 151.367 348.893 154.812L290.559 234.812C287.604 238.865 287.174 244.236 289.449 248.709C291.725 253.184 296.314 256 301.334 256Z" />
                <path fill="gray" d="M564.449 0H235.551C211.498 0 192 19.998 192 44.668V275.332C192 300.002 211.498 320 235.551 320H368V256H301.334C296.314 256 291.725 253.184 289.449 248.709C287.174 244.236 287.604 238.865 290.561 234.813L348.893 154.813C351.406 151.367 355.41 149.334 359.668 149.334S367.93 151.367 370.443 154.813L389.068 180.361L441.354 101.938C443.824 98.227 447.988 96 452.447 96C456.904 96 461.068 98.227 463.541 101.938L505.521 164.91L608 130.75V44.668C608 19.998 588.5 0 564.449 0ZM288 128C270.328 128 256 113.672 256 96S270.328 64 288 64C305.676 64 320 78.328 320 96S305.676 128 288 128Z" />
            </svg>
            <span class="ml-3">Add New Media</span>
        </div>
    </x-slot>
    <x-form x-data="{ toggleOn: false, toggleOn2: false }" action="{{ route('store-media') }}" enctype="multipart/form-data">
        <x-form.input label="Media URL" name="media_url" type="text"  x-show="toggleOn" x-bind:disabled="!toggleOn"/>
        <x-form.input label="Media Upload" name="media_upload" type="file" x-show="!toggleOn"  x-bind:disabled="toggleOn"/>
        <x-form.toggle label="Use Web URL" button_name="toggleOn"/>
        <x-form.toggle label="Is A Cover Image?" button_name="toggleOn2"/>
        <x-form.input name="is_cover" type="hidden" x-bind:value="toggleOn2" ></x-form.input>
        <x-form.input label="Caption" type="text" name="caption" />
        <x-form.input label="Alt Text" type="text" name="alt_text" />
        <x-slot name="button1">
            <span class="flex-auto w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="submit"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Submit
                </button>
            </span>
        </x-slot>
        <x-slot name="button2">
            <span class="flex-auto w-full rounded-md shadow-sm sm:w-auto">
                <button type="button"
                        @click="on = false"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Cancel
                </button>
            </span>
        </x-slot>
    </x-form>
</x-modal>
