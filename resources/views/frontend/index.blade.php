<!-- resources/views/frontend/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BaleRasa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('frontend.partials.links')

</head>

<body>

    @include('frontend.partials.navbar')

    @include('frontend.partials.hero')

    <main id="main">

        @include('frontend.partials.about')

        @include('frontend.partials.whyus')

        @include('frontend.partials.menu', ['menus' => $menus]) <!-- Kirim data menus ke partial -->

        {{-- @include('frontend.partials.special') --}}

        {{-- @include('frontend.partials.event') --}}

        @include('frontend.partials.bookatable')

        @include('frontend.partials.testimonials')

        {{-- @include('frontend.partials.gallery')

        @include('frontend.partials.chef') --}}

        @include('frontend.partials.contact')

    </main><!-- End #main -->

    @include('frontend.partials.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    @include('frontend.partials.links')

</body>

</html>
