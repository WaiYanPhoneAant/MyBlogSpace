<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-adsense-account" content="ca-pub-1618114950811949">
    <meta name="description" content="{{$description ?? 'Blog By Verse'}}">
    <title>{{$title ??'Blog By Verse'}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Open Graph Tags -->
    {{-- <link rel="stylesheet" href="{{asset('cdn/fontawesome.css')}}"  /> --}}
    {{-- <link rel="stylesheet" href="{{asset('cdn/googlefont.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('cdn/bootstrap5.css')}}">
    <meta property="og:title" content="{{$title ?? 'Blog By Verse'}}">
    <meta property="og:description" content="{{$description ?? 'Blog By Verse'}}.">
    <meta property="og:image" content="{{$featuredImage  }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="stylesheet" href="{{$style}}">
    @livewireStyles
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1618114950811949"
        crossorigin="anonymous"></script>

        <script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
        </script>
</head>
<body>
    <amp-auto-ads type="adsense" data-ad-client="ca-pub-1618114950811949">
    </amp-auto-ads>
    <div class=" p-0" wire:ignore.self>
        <div class="min-vh-100"  style="margin-bottom: 300px;">{{$slot}}</div>
        <footer class="bg-dark text-white text-center py-3 bottom-0 w-100 mt-5" wire:ignore>
            <div class="container">
                <p>&copy; {{ date('Y') }} MyVerse. All rights reserved.</p>
                <p>
                    {{-- Follow us on: --}}
                    <a href="{{route('siteinfo.privacy')}}" wire:navigate class="text-white mx-2"><i class="fa-solid fa-shield-alt pe-1"></i> Privacy Policy</a>
                    <a href="{{route('siteinfo.about')}}" class="text-white mx-2">  About Us</a>
                    <i class="fa-solid fa-info-circle pe-1"></i>
                    {{-- <a href="#" class="text-white mx-2">Instagram</a> --}}
                </p>
            </div>
        </footer>
    </div>
</body>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
            function copyLink(projectId) {
        var copyText = document.getElementById("projectLink" + projectId);
        var copyButton = document.getElementById("copyButton" + projectId);
        var copyIcon = document.getElementById("copyIcon" + projectId);
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        navigator.clipboard.writeText(copyText.value).then(function() {
            copyIcon.className = "fa-solid fa-check";
            copyButton.classList.add("btn-success");
            setTimeout(function() {
                copyIcon.className = "fa-solid fa-copy";
                copyButton.classList.remove("btn-success");
            }, 5000);
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }
    </script>

</html>
