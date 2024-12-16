<div class="search-bar col-10 col-md-6 col-lg-4 m-auto  py-4 position-relative">
    <!-- border-top-0 border-start-0 border-end-0 rounded-0 -->
    <input type="text" class="form-control form-control-md  explore bg-light" placeholder="Explore...." wire:model.live.debounce.15ms="keyword" >
    <div class="position-absolute loading-notch " wire:loading >
        <i class="fa-solid fa-circle-notch fa-spin text-black"></i>
    </div>
</div>
