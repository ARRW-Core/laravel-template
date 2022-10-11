@props(['label' => '', 'name', 'required' => false, 'autofocus' => false])


<div class="flex flex-col items-center mt-1 text-sm sm:flex-row sm:space-y-0 sm:space-x-4">
    <div class="w-full sm:mb-2">
        <label for="input1">
            <span class="ml-2 text-sm text-gray-800 sm:text-base dark:text-gray-200">What are your interest?</span>
            <input id="input1" minlength="5"
                   class="mt-1 py-3 px-5 w-full border-2 border-purple-300 rounded-2xl outline-none placeholder:text-gray-400 invalid:text-pink-700 invalid:focus:ring-pink-700 invalid:focus:border-pink-700 peer dark:bg-gray-500 dark:text-gray-200 dark:placeholder:text-gray-300 dark:invalid:text-pink-300 dark:border-gray-400"
                   type="text" placeholder="Type something" />
            <p class="ml-2 text-xs text-pink-700 invisible peer-invalid:visible dark:text-gray-200">less than 5
                characters</p>
        </label>
    </div>
    <div
        class="w-full text-center py-3 px-8 text-sm font-medium bg-purple-500 text-gray-100 rounded-2xl cursor-pointer sm:w-min hover:bg-purple-700 hover:text-gray-50 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-50 mb-4 sm:mb-0">
        <span>Add</span>
    </div>
</div>
