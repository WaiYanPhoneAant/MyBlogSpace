<x-layout :style='asset("css/mySpace/view.css")'
        :featuredImage='asset("storage/".$featured_image)' wire:key='view' title='{{$title}}' :description='$excerpt' :slug='$slug'>
    <div class="container-fluid p-0" wire:ignore.self>
        <section class="w-auto   shadow-sm p-1 mini-nav" wire:ignore>
            <nav class="container d-flex justify-content-between  fw-bold p-2">
                <div class="logo text-dark">Blog</div>
                <div class="link  text-dark">By Verse</div>
            </nav>
        </section>
        <livewire:project-view :slug='$slug' lazy />
        <section class="d-none">
            <div class="container  mt-5">
                <div class="col-10  m-auto d-flex gap-1">
                    <div class="col-3 bg-light rounded-2" style="height: 400px;">

                    </div>
                    <div class="col-9 " style="height: 600px;">
                        <div class="bg-light rounded-2 " style="height: 197px; margin-bottom: 6px;">

                        </div>
                        <div class="bg-light rounded-2" style="height: 197px;">

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-layout>
