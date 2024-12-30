<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <style>
        /* CSS untuk smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
@include('partials.head')
@if (session('success'))
    <div
        class="fixed top-20 w-[600px] flex justify-center left-1/2 transform -translate-x-1/2 z-50 bg-green-100 text-green-800 p-4 rounded-xl shadow-lg">
        {{ session('success') }}
    </div>
@endif

<body id="page-top">
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <div class="m-auto p-0">
        @include('partials.isi.part-beranda')
    </div>

    <!--TENTANG-->
    <div class="pt-12" id="tentang">

        <section class="resume-section p-3 lg:p-5 flex flex-col container 2xl:px-40 mx-auto">
            @include('partials.isi.part-tentang')
        </section>
    </div>

    <!--SOSMED-->
    <div class="">
        @include('partials.isi.part-sosmed')
    </div>
    {{ $slot }}

</body>

</html>
