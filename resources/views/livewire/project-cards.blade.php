<div class="row justify-content-center align-items-center">
    @if ($loading==true)
        <x-cardloading></x-cardloading>
    @endif
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
                        <div class="card-bg col-12" style="background-image: url({{asset('storage/'.$post->featured_image)}})"></div>
                        @endif
                        <div class="d-flex flex-column align-items-start mt-1">
                            <h2 class="card_title fw-semibold pt-1 text-dark  mb-1 post=card-title" >{{$post->title}}</h2>
                        </div>

                        <div class="card_summary ">
                            <p>
                                {!! nl2br(trim(Str::limit($post->excerpt, 80, ' .....'),'')) !!}
                            </p>
                        </div>
                        <div class="project_detail text-muted mt-3" style="color: rgba(0, 0, 0, 0.562)">
                            <h4 class="text mb-2"><i class="fa-solid fa-earth"></i>
                                {{-- Publish Date : --}}
                                <span>{{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y (g:i A)') }}</span>
                            </h4>
                            {{-- @foreach ($post->categories as $category)
                                <h4 class="text "> <span>{{$category->name}}</span></h4>
                            @endforeach --}}
                        </div>
                        @foreach ($post->categories as $index=>$category)
                            <span class="badge bg-secondary fw-light badge-info">{{ $category->name }}</span>
                            @if($index==2)
                                <span class="badge bg-secondary fw-light badge-info">...</span>
                                @break
                            @endif
                        @endforeach

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


