@if (session('user_blocked'))
<div class="mb-4 font-medium text-sm text-red-600">
    {{ session('user_blocked') }}
</div>
{{session()->forget('user_blocked');}}

@else
@if ($errors->any())
<div {{ $attributes }}>
    <div class="font-medium text-red-600">{{ __('Ups! Algo salió mal.') }}</div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endif