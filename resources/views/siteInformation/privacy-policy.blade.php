<x-layout wire:key='view' style="" title='About Us' description='About Us'>
    <style>
        * {
            font-family: "Roboto", sans-serif;
        }
    </style>
    <div class="container-fluid p-0" wire:ignore.self>
        <section class="w-auto   shadow-sm p-1 mini-nav" wire:ignore>
            <nav class="container d-flex justify-content-between  fw-bold p-2">
                <div class="logo text-dark">Blog</div>
                <div class="link  text-dark">By Verse</div>
            </nav>
        </section>
        <section class="col-md-9 m-auto">
            <div class="container mt-5">
                <a wire:navigate href="{{route('space.index')}}" class="btn btn-dark btn-sm">
                    <i class="fa-solid fa-arrow-left"></i> Back to Blog
                </a>
                <div class="col-12">
                    {{-- <div class="col-md-4">
                        <img src="path/to/your/image.jpg" class="img-fluid rounded" alt="About Us Image">
                    </div> --}}
                    <div class="col-md-12">
                        <h2 class="mt-5 mb-1 fw-bold ">Privacy Policy</h2>
                        <span class="fw-semibold" style="font-size: 14px">Effective Date: {{now()->format('F j, Y')}}</span>
                        {{-- <h3 class="fw-semibold">Welcome to Blog By Verse!</h3> --}}
                        <p class="pt-3">
                            At Blog By Verse, we value your privacy and are committed to protecting your personal information. We do not collect,
                            store, or process any personal data from our users. Our website is designed for informational purposes only, allowing
                            users to read content and share it through third-party platforms. <i><b>
                                If any data collection or cookies are needed for
                                specific features, we will clearly mention it in this privacy policy and notify our audience accordingly.</b></i>
                        </p>
                        <div class="col-md-7 m-auto text-center mb-5"><hr class="my-4" style="border-top: 1px solid #888787;"></div>

                        <h4 class="fw-semibold" style="font-size: 18px">No Data Collection :</h4>
                        {{-- <h3 class="fw-semibold">Welcome to Blog By Verse!</h3> --}}
                        <p class="pt-3">
                            We do not collect personal information, including names, emails, or browsing history.
                        </p>

                        <div class="col-12 m-auto text-center mb-5"><hr class="my-4" style="border-top: 1px solid #888787;"></div>

                        <h4 class="fw-semibold" style="font-size: 18px">No Cookies or Tracking :</h4>
                        {{-- <h3 class="fw-semibold">Welcome to Blog By Verse!</h3> --}}
                        <p class="pt-3">
                           Our website does not use cookies, tracking technologies, or analytics tools.
                        </p>

                        <div class="col-12 m-auto text-center mb-5">
                            <hr class="my-4" style="border-top: 1px solid #888787;">
                        </div>
                        <h4 class="fw-semibold" style="font-size: 18px">Third-Party Sharing :</h4>
                        {{-- <h3 class="fw-semibold">Welcome to Blog By Verse!</h3> --}}
                        <p class="pt-3">
                           When you share our content through third-party platforms, their privacy policies will apply.
                        </p>

                        <div class="col-12 m-auto text-center mb-5">
                            <hr class="my-4" style="border-top: 1px solid #888787;">
                        </div>

                        <h4 class="fw-semibold" style="font-size: 18px">Security :</h4>
                        {{-- <h3 class="fw-semibold">Welcome to Blog By Verse!</h3> --}}
                        <p class="pt-3">
                             Since we do not collect data, there is no personal data to secure.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container  mt-5 d-none">
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
