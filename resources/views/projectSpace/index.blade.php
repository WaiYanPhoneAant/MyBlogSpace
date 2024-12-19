<x-layout :style='asset("css/mySpace/codeSpace.css")' wire:key='nav' >
    <div class="container-fluid p-0" wire:ignore.self>
        <section class="w-auto hero_section hero_section-filter shadow-sm p-1" id="heroSection" wire:ignore>
            <div class="bg-glass">
                <nav class="container d-flex justify-content-between fw-bold p-2">
                    <div class="logo text-white">Blog</div>
                    <div class="link text-white">By Verse</div>
                </nav>
            </div>
            <header class="text-center mt-4">
                <h1 class="fw-bolder header">All Your Knowledges And Entertainments</h1>
            </header>
            <livewire:projectsearch></livewire:projectsearch>
            <div class="col-10 m-auto tags d-flex text-center justify-content-start mt-2 mb-2 gap-lg-4 gap-2 overflow-x-auto justify-content-md-center" wire:ignore style="scrollbar-width: none; -ms-overflow-style: none;">
                <button class="btn shadow-sm p-1 tag px-3">All</button>
                <button class="btn shadow-sm p-1 tag px-3">Tech</button>
                <button class="btn shadow-sm p-1 tag px-3">Home</button>
                <button class="btn shadow-sm p-1 tag px-3">DIY</button>
                <button class="btn shadow-sm p-1 tag px-3">Novels</button>
                <button class="btn shadow-sm p-1 tag px-3">Knowledges</button>
                <button class="btn shadow-sm p-1 tag px-3">Entertainment</button>
            </div>
            <div class="slider-dots text-center mt-2">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </section>
        <section class="showcase pt-10 h-auto">
            <div class="container-fluid px-md-3 px-lg-5">
                <livewire:project-cards>
            </div>
        </section>

    </div>

    <script>
        var slideIndex = 0;
        var slides = [
            "{{ asset('/background/bg.jpg') }}",
            "{{ asset('/background/bg2.jpg') }}",
            // "{{ asset('/background/bg3.jpg') }}"
        ];

        function showSlides() {
            try {
                const heroSection = document.getElementById('heroSection');
                const dots = document.getElementsByClassName('dot');
                slideIndex++;
                if (slideIndex > slides.length) { slideIndex = 1 }
                heroSection.style.backgroundImage = `url(${slides[slideIndex - 1]})`;
                for (let i = 0; i < dots.length; i++) { dots[i].className=dots[i].className.replace(" active", "" ); } dots[slideIndex -
                    1].className +=" active" ; setTimeout(showSlides, 5000); // Change image every 5 seconds

            } catch (error) {

            }
        }

        function currentSlide(n) {
            slideIndex = n - 1;
            showSlides();
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            showSlides();
        });
    </script>
</x-layout>
