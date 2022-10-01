@props([
'method' => 'POST',
'action' => '',
'submit_label' => 'Submit',
'cancel_label' => 'Cancel',
])

<form method="{{ $method == 'GET' ? 'GET' : 'POST' }}"
      action="{{ $action }}" {{ $attributes }}
>
    @csrf

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}

    <div class="py-3 sm:flex sm:flex-row-reverse">
        {{ $button1 ?? '' }}

        {{ $button2 ?? '' }}

        {{ $button3 ?? '' }}
    </div>
</form>
