
<x-layout :style='asset("css/mySpace/codeSpace.css")' wire:key='nav'>
    <div class="container-fluid p-0">
        <section class="w-auto  hero_section shadow-sm p-1 " style="background: url({{asset('/storage/background/bg.jpg')}})">
            <nav class="container d-flex justify-content-between  fw-bold p-2">
                <div class="logo text-white">Yan</div>
                <div class="link text-white">Verse</div>
            </nav>
            <header class="text-center mt-4">
                <h1 class="fs-4 fw-bolder ">All Your Knowledges And Entertainments</h1>
            </header>
            <livewire:projectsearch ></livewire:projectsearch>
            <div class="col-10 m-auto tags row text-center justify-content-center mt-4 mb-2 gap-lg-4 gap-2" wire:ignore>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    All
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    Tech
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    Home
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    DIY
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    Novels
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    Knowledges
                </div>
                <div class="shadow-sm  p-1 tag  px-3  ">
                    Entertainment
                </div>
            </div>
        </section>
        <section class="showcase pt-10">
            <div class="container-fluid px-md-3 px-lg-5">
                <livewire:project-cards>
            </div>
        </section>
    </div>
</x-layout>
