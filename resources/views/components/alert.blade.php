@if(Session::has('status'))
<div class="w-full">
    <div class="px-4 py-4 mt-2 mb-2 rounded text-white @if (Session::get('status') == 'success') bg-green-600 @else bg-red-600  @endif">
        {{ Session::get('message') }}
    </div>
</div>
@endif
