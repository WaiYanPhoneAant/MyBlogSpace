<x-layout   wire:key='view' style="" title='About Us' description='About Us'>
    <style>
        *{
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
                        <h2 class="my-5 fw-bold ">About Us</h2>
                        <h3 class="fw-semibold">Welcome to Blog By Verse!</h3>
                        <p class="pt-3">
                            Our mission is to provide readers with insightful, engaging, and valuable content on a wide range of topics, including
                            general knowledge, technology, and software development. Whether you are a tech enthusiast, a developer, or someone
                            curious about the latest trends, our blog is here to inspire and inform.
                        </p>
                        <i> What We Offer: </i>
                        <p class="pt-3">
                            <ul style="list-style-type: disc; padding-left: 20px; line-height: 1.6; font-size: 1.1rem;">
                                <li class="mb-2"><i calss="fw-semibold">Informative Content  : </i>  Thoughtfully curated articles and insights to enhance your understanding of various topics.</li>
                                <li class="mb-2"><i calss="fw-semibold">Tech and Development : </i> A special focus on technology and software development to cater to professionals and learners alike.</li>
                                <li class="mb-2"><i calss="fw-semibold">Sharing Made Easy : </i> Seamlessly share our articles with your network through integrated sharing options.</li>
                            </ul>
                            <p class="pt-3">
                                <b class="fw"><i>Thank you for visiting Blog By Verse .</i></b> We hope you enjoy exploring our content as much as we enjoy creating it for you!
                            </p>
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
