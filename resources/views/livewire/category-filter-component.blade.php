<div class="col-10 m-auto tags d-flex text-center justify-content-start mt-2 mb-2 gap-lg-4 gap-2 overflow-x-auto justify-content-md-center"

    @php
        $activeClasses="bg-white text-dark";
    @endphp
    tyle="scrollbar-width: none; -ms-overflow-style: none;">
    <div class="btn shadow-sm p-1 tag px-3  {{$category_id == 'all' ? $activeClasses :'' }}"
    wire:click='clickCategory()'>All</div>
    @foreach ($categories as $category)
    <div class="btn shadow-sm p-1 tag px-3 {{$category_id == $category['id'] ? $activeClasses :'' }}"
    wire:click='clickCategory({{ $category["id"] }}, "{{ $category["slug"] }}")'>
    <span class="">{{ $category['name'] }}</span></div>
    @endforeach
    {{-- <button class="btn shadow-sm p-1 tag px-3">Tech</button>
    <button class="btn shadow-sm p-1 tag px-3">Home</button>
    <button class="btn shadow-sm p-1 tag px-3">DIY</button>
    <button class="btn shadow-sm p-1 tag px-3">Novels</button>
    <button class="btn shadow-sm p-1 tag px-3">Knowledges</button>
    <button class="btn shadow-sm p-1 tag px-3">Entertainment</button> --}}
</div>
