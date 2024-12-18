<div class="row justify-content-center align-items-center">
    @if ($loading==true)
        <x-cardloading></x-cardloading>
    @endif
    <div class="" wire:loading>
        <x-cardloading></x-cardloading>
    </div>
    @if (count($posts)>0)
    <div class="col-12 row justify-content-center align-items-center" wire:loading.remove>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1618114950811949"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid"
            data-ad-client="ca-pub-1618114950811949" data-ad-slot="5480126264"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        @foreach ($posts as $index=>$post)
            <div wire:key="{{$post->id}}" class="col-lg-3 col-md-6 col-12 mb-3 p-2 post-card">
                <a href="{{route('space.show',$post->slug)}}" wire:navigate class="text-decoration-none">
                    <div class="card_block p-3 rounded-3">
                        @if($post->featured_image)
                        <div class="card-bg col-12" style="background-image: url({{asset($post->featured_image)}})"></div>
                        @endif
                        <div class="d-flex flex-column align-items-start mt-3">
                            <h2 class="card_title roboto-thin pt-1 text-dark  mb-1 post=card-title">{{$post->title}}</h2>
                        </div>
                        <div class="project_detail text-muted">
                            <h4 class="text mb-2"><i class="fa-solid fa-earth"></i>
                                {{-- Publish Date : --}}
                                 <span>{{$post->published_at}}</span></h4>
                            {{-- <h4 class="text ">Tech Stack : <span>{{$post->tech_stack}}</span></h4> --}}
                        </div>
                        <div class="card_summary mt-3">
                            <p>
                                {!! $post->excerpt !!}
                            </p>
                        </div>

                        <div class="project_detail mt-3 text-muted">
                            @if ($post->visibility=='private')
                                <button class="btn btn-sm shadow-sm bg-light-danger text-white"><i class="fa-solid fa-lock"></i>
                                    Private
                                </button>
                            @else
                                <a class="btn btn-sm shadow-sm" href="{{route('space.show',$post->slug)}}" target="__blank"><i
                                        class="fa-solid fa-eye"></i>
                                    Read</a>
                            @endif
                            {{-- <a class="btn btn-sm shadow-sm" href="{{$post->preview_url ?? '#'}}" target="__blank"><i class="fa-solid fa-share text-primary"></i>
                                Share</a> --}}

                        <button class="btn btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#shareModal{{$post->id}}">
                            <i class="fa-solid fa-share text-primary"></i> Share
                        </button>

                        <!-- Modal -->
                        <div class="modal fade m-auto" id="shareModal{{$post->id}}" tabindex="-1" aria-labelledby="shareModalLabel{{$post->id}}" aria-hidden="true">
                            <div class="modal-dialog m-auto p-2" style="-width: 250px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="shareModalLabel{{$post->id}}">Share On</h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('space.show', $post->slug) }}" target="_blank" class="btn btn-primary">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ route('space.show', $post->slug) }}" target="_blank" class="btn btn-dark text-white">
                                                {{-- <i class="fa-brands fa-x-twitter text-white"></i> --}}
                                                 X
                                            </a>
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('space.show', $post->slug) }}" target="_blank" class="btn btn-primary">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </div>
                                        <div class="mt-3 input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm outline-none " style="outline: none" value="{{ route('space.show', $post->slug) }}" id="projectLink{{$post->id}}" readonly>
                                            <button class="btn btn-secondary input-group-text" id="copyButton{{$post->id}}" onclick="copyLink({{$post->id}})">
                                                <i class="fa-solid fa-copy" id="copyIcon{{$post->id}}"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </a>
            </div>
            @if($index % 10 == 0 && $index!=0)
                <div class="col-lg-3 col-md-6 col-12 mb-3 p-2">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1618114950811949"
                        crossorigin="anonymous"></script>
                    <!-- blog-card -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1618114950811949" data-ad-slot="2713233795"
                        data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            @endif
        @endforeach
    </div>
    @else
            <div class="col-12 text-center">There is no project to show</div>
    @endif

    <div class="">
        <div class="d-flex justify-content-center">{{$posts->links()}}</div>
    </div>
</div>

<script>

</script>


