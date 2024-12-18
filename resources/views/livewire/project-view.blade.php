<section class="mt-1">
    <div class="container  mt-5">
        <div class="col-md-10 m-auto mb-3">
            <a wire:navigate href="{{route('space.index')}}" class="btn btn-outline-secondary btn-sm">
              <i class="fa-solid fa-arrow-left"></i>  back
            </a>
        </div>

        <div class="col-md-7">
            {{-- <div class=" col-12" style="background-image: url({{asset($post->featured_image)}})">

            </div> --}}
            {{-- <img src="{{asset($post->featured_image)}}" alt=""> --}}
        </div>
        <div class="col-md-7  m-auto d-flex gap-2">
            {{-- <div class="card_img  bg-light">
                <img src="https://preview.keenthemes.com/metronic8/demo38/assets/media/svg/brand-logos/xing-icon.svg"
                    class="w-100 p-3" alt="">
            </div> --}}
            <div class="mt-1 w-100 d-flex justify-content-between">
                <div class="col-6">
                    <div class="fw-bold fs-5 mb-0 pb-0">{{$post->title}}</div>
                    <span class="date fw-semibold"><i class="fa-solid fa-earth me-2 text-muted"></i>{{$post->published_at}}</span>
                </div>
                {{-- <div class="col-6 tech-stack d-flex gap-2 justify-content-end text-end">
                    <i class="fa-brands fa-html5 fs-5"></i>
                    <i class="fa-brands fa-css3 fs-5"></i>
                    <i class="fa-brands fa-php fs-5"></i>
                    <i class="fa-brands fa-laravel fs-5"></i>
                    <i class="fa-brands fa-js-square fs-5"></i>
                </div> --}}
            </div>
        </div>
        <div class="col-10  m-auto d-flex gap-1">
            <div class="mt-4 w-100 d-flex justify-content-between">
                <div class="project_detail mt-3 text-muted">

                </div>
            </div>
        </div>
        <div class="col-md-7 mt-5 m-auto">
            <div class="">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1618114950811949"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid"
                    data-ad-client="ca-pub-1618114950811949" data-ad-slot="6740942869"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <p class="text-muted">

                {!! nl2br($post->content) !!}
            </p>
        </div>
    </div>
</section>
