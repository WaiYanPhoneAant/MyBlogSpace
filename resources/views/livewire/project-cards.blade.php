
<div class="row   justify-content-center align-items-center ">
    @if ($loading==true)
        <x-cardloading></x-cardloading>
    @endif
    <div class="" wire:loading>
        <x-cardloading></x-cardloading>
    </div>
    @if (count($projects)>0)
    <div class="col-12 row justify-content-center align-items-center" wire:loading.remove>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1618114950811949"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid"
            data-ad-client="ca-pub-1618114950811949" data-ad-slot="5480126264"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        @foreach ($projects as $index=>$project)
            <div wire:key="{{$project->id}}" class="col-lg-3 col-md-6 col-12 mb-3 p-2">
                <a href="{{route('space.show',$project->id)}}" wire:navigate class="text-decoration-none">
                    <div class="card_block p-3 rounded-3">
                        <div class="card-bg col-12" style="background-image: url({{asset('/background/bg2.jpg')}})"></div>
                        <div class="d-flex flex-column align-items-start mt-3">
                            <h2 class="card_title pt-1 text-dark fw-semibold mb-1">{{$project->title}}</h2>
                            {{-- <span class="card_description text-muted mt-0 ">{{$project->title }}</span> --}}
                        </div>
                        <div class="project_detail  text-muted">
                            <h4 class="text mb-2"><i class="fa-solid fa-earth"></i> Publish Date : <span>{{$project->created_at}}</span></h4>
                            {{-- <h4 class="text ">Tech Stack : <span>{{$project->tech_stack}}</span></h4> --}}
                        </div>
                        <div class="card_summary mt-3">
                            <p>
                               Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi aliquid est accusantium, enim fugiat totam corrupti ea quasi unde? Quo!
                            </p>
                        </div>

                        <div class="project_detail mt-3 text-muted">
                            @if ($project->visibility=='private')
                                <button class="btn btn-sm shadow-sm bg-light-danger text-white"><i class="fa-solid fa-lock"></i>
                                    Private
                                </button>
                            @else
                                <a class="btn btn-sm shadow-sm" href="{{$project->source_code_url ?? '#'}}" target="__blank"><i
                                        class="fa-solid fa-eye"></i>
                                    Read</a>
                            @endif
                            <a class="btn btn-sm shadow-sm" href="{{$project->preview_url ?? '#'}}" target="__blank"><i class="fa-solid fa-share text-primary"></i>
                                Share</a>
                        </div>
                    </div>
                </a>
            </div>
            @if($index % 2 == 0 )
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
        <div class="d-flex justify-content-center">{{$projects->links()}}</div>
    </div>
</div>

