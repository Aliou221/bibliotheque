<div class="card bg-white p-4 rounded shadow-sm cursor-pointer my-3 flex-1 w-full">
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-gray-500">{{ $title }}</h4>
        <x-dynamic-component :component="'icons.' . $icon" class="h-[35px] w-[35px] p-[6px] rounded-[5px] {{$iconClasse}}"/>
    </div>
    <span class="text-2xl font-bold text-gray-700 py-3">
        {!! $icon === 'book' 
            ? e($number) . '/' . '<span class="text-xl text-gray-400">' . e($total) . '</span>' 
            : e($number) 
        !!}
    </span>
</div>
