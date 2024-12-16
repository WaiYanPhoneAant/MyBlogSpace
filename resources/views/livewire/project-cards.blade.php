
<div class="row   justify-content-start ">
    @if ($loading==true)
        <x-cardloading></x-cardloading>
    @endif
    <div class="" wire:loading>
        <x-cardloading></x-cardloading>
    </div>
    @if (count($projects)>0)
    <div class="col-12 row" wire:loading.remove>
        @foreach ($projects as $project)

            <div wire:key="{{$project->id}}" class="col-lg-3 col-md-6 col-12 mb-3 p-2">
                {{-- <div class="">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5432936394622877"
                        crossorigin="anonymous"></script>
                    <!-- test -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5432936394622877" data-ad-slot="3047262980"
                        data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div> --}}
                <a href="{{route('space.show',$project->id)}}" wire:navigate class="text-decoration-none">
                    <div class="card_block p-3 rounded-3">
                        <div class="card-bg col-12"></div>
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
        @endforeach
    </div>
    @else
            <div class="col-12 text-center">There is no project to show</div>
    @endif

    <div class="">
        <div class="d-flex justify-content-center">{{$projects->links()}}</div>
    </div>
</div>
