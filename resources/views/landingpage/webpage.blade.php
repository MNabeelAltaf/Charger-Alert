<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">

<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


<body class="font-urbanist text-base text-black dark:text-white dark:bg-slate-900">


    <span
        class="fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 start-1/2 ltr:-translate-x-1/2 rtl:translate-x-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"></span>


    @include('landingpage.header')
    @include('landingpage.navbar')
    @include('landingpage.content', ['categories' => $categories])
    @include('landingpage.footer')



    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 h-9 w-9 text-center bg-violet-600 text-white leading-9"><i
            class="uil uil-arrow-up"></i>
    </a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    @include('landingpage.JsFiles')
    <!-- JAVASCRIPTS -->
</body>

</html>
