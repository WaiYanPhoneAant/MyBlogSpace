<section class="mt-1">
    <div class="container  mt-5 px-2">
            <div class="col-md-10 m-auto mb-5">
                <a wire:navigate href="{{route('space.index')}}" class="btn btn-outline-secondary btn-sm">
                    <i class="fa-solid fa-arrow-left"></i>  back to blog
                </a>
            </div>
            <div class="col-12 col-md-7  m-auto d-flex gap-2 ">
                {{-- <div class="card_img  bg-light">
                    <img src="https://preview.keenthemes.com/metronic8/demo38/assets/media/svg/brand-logos/xing-icon.svg"
                        class="w-100 p-3" alt="">
                </div> --}}
                <div class="mt-1 w-100 row d-flex justify-content-between">
                    <div class="col-12">
                        <h1 class="view-title pt-0 mb-0 pb-0">{{$post->title}}</h1>
                        <span class="date fw-semibold"><i class="fa-solid fa-earth me-2 text-muted"></i>{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y (g:i A)') }}</span>
                    </div>
                    <div class="row mt-3 justify-content-center align-items-center">
                    <div class="col-12 mb-3 col-md-6">
                        @foreach ($post->categories as $index=>$category)
                            <span class="badge bg-secondary fw-light badge-info">{{ $category->name }}</span>
                            @if($index==2)
                                <span class="badge bg-secondary fw-light badge-info">...</span>
                                @break
                            @endif
                        @endforeach
                    </div>
                        <div class="col-12 mb-3 col-md-6 text-md-end project_detail  text-muted">
                            <button class="btn btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#shareModal{{$post->id}}">
                                <i class="fa-solid fa-share text-primary"></i> Share
                            </button>
                            <div class="modal fade m-auto" id="shareModal{{$post->id}}" tabindex="-1"
                                aria-labelledby="shareModalLabel{{$post->id}}" aria-hidden="true">
                                <div class="modal-dialog m-auto p-2" style="-width: 250px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="shareModalLabel{{$post->id}}">Share On</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('space.show', $post->slug) }}"
                                                    target="_blank" class="btn btn-primary">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?url={{ route('space.show', $post->slug) }}"
                                                    target="_blank" class="btn btn-dark text-white">
                                                    {{-- <i class="fa-brands fa-x-twitter text-white"></i> --}}
                                                    X
                                                </a>
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('space.show', $post->slug) }}"
                                                    target="_blank" class="btn btn-primary">
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                            <div class="mt-3 input-group input-group-sm">
                                                <input type="text" class="form-control form-control-sm outline-none " style="outline: none"
                                                    value="{{ route('space.show', $post->slug) }}" id="projectLink{{$post->id}}" readonly>
                                                <button class="btn btn-secondary input-group-text" id="copyButton{{$post->id}}"
                                                    onclick="copyLink({{$post->id}})">
                                                    <i class="fa-solid fa-copy" id="copyIcon{{$post->id}}"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 m-auto text-center mb-5"><hr class="my-4" style="border-top: 1px solid #888787;"></div>
            @if($post->featured_image)
            <div class="col-md-7 m-auto">
                <div class="feature-image-div text-center p-5">
                    <img class="img-fluid rounded" alt="{{$post->slug}}" src="{{asset('storage/'.$post->featured_image)}}" alt="">
                </div>
            </div>
            @endif
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
                <p class="mt-3" style="color: rgba(0, 0, 0, 0.852);">
                    {!! nl2br($post->content) !!}
                </p>
            </div>
    </div>
</section>
