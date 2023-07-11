@section('title', 'Techblog - About Us')
@extends('layouts.app')

@section('content')

<style>
    .blog-image {
        width: 100%;
        height: 290px;
        object-fit: cover;
        object-position: center;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 6px rgba(143, 24, 24, 0.1);
    }

    @media (max-width: 767px) {
        .card {
            height: auto;
        }
    }
</style>

<div class="container">
    <h2 class="card-title">About Us</h2>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">

                <img src="{{ asset('assets/images/aboutus/mission.jpg') }}" class="card-img-top blog-image" alt="Image 1">

                <div class="card-body">
                    <h5 class="card-title">Our Mission</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet
                        justo id feugiat vestibulum. Maecenas congue, neque in mollis tempus, libero arcu feugiat
                        ex, at semper ligula sapien at est. Sed dignissim eros non nulla rutrum, vitae luctus mauris
                        ultricies.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('assets/images/aboutus/vision.jpg') }}" class="card-img-top blog-image" alt="Image 1">

                <div class="card-body">
                    <h5 class="card-title">Our Vision</h5>
                    <p class="card-text">Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                        ac turpis egestas. Integer non pretium mauris. Sed maximus efficitur velit, sit amet
                        finibus nibh. Donec at ligula id mauris faucibus venenatis. Proin dapibus ligula eu nisl
                        sodales, non venenatis arcu aliquam.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="{{ asset('assets/images/aboutus/team.jpg') }}" class="card-img-top blog-image" alt="Image 1">

                <div class="card-body">
                    <h5 class="card-title">Our Team</h5>
                    <p class="card-text">Quisque eu dolor et dolor congue vulputate. Nam auctor tellus eu nunc
                        congue lobortis. Sed vehicula nisi elit, nec lobortis mi mattis in. Donec lobortis ex ut
                        commodo ultricies. Pellentesque habitant morbi tristique senectus et netus et malesuada
                        fames ac turpis egestas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.include.fronted-footer')
@endsection
