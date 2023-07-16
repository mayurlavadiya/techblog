@section('title', 'Techblog - About Us')
@extends('layouts.app')

@section('content')

    <style>
        .blog-image {
            width: 100%;
            height: 350px;
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

    <div class="container py-4">
        <h2 class="card-title">About Us</h2>
        <hr>
        <div class="row">
            <h1 class="text-center text-dark">TechBlog</h1>
            <div class="underline">
            </div>
            <p>
                Welcome to <b>TechBlog,</b> your ultimate destination for all things tech-related. Our mission is to
                provide you with the latest news, updates, tips, and insights from the world of technology. Whether
                you're a tech enthusiast, a professional in the industry, or simply someone curious about the latest
                gadgets and innovations, TechBlog is here to keep you informed and inspired.</p>
            <p>
                At <b>TechBlog,</b> we strive to deliver high-quality content that covers a wide range of topics, including
                smartphones, computers, artificial intelligence, cybersecurity, software, and much more. Our team of
                dedicated tech enthusiasts and industry experts work tirelessly to bring you informative articles,
                reviews, tutorials, and in-depth analysis to help you stay ahead in the fast-paced world of
                technology.
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">

                    <img src="{{ asset('assets/images/aboutus/mission.jpg') }}" class="card-img-top blog-image" alt="Image 1">

                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">At TechBlog, our mission is to empower individuals and businesses with the
                            knowledge and understanding they need to navigate the world of technology. We aim to provide
                            comprehensive and insightful content that helps our audience stay informed, make informed
                            decisions, and embrace technology to its fullest potential.

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="{{ asset('assets/images/aboutus/vision.jpg') }}" class="card-img-top blog-image"
                        alt="Image 1">

                    <div class="card-body">
                        <h5 class="card-title">Our Vision</h5>
                        <p class="card-text">Our vision is to become a trusted and go-to resource for tech enthusiasts,
                            professionals, and anyone seeking reliable information about the latest trends, innovations, and
                            advancements in the tech industry. We aspire to foster a community of technology enthusiasts who
                            can learn, collaborate, and grow together in their pursuit of technological excellence.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="{{ asset('assets/images/aboutus/team.jpg') }}" class="card-img-top blog-image" alt="Image 1">

                    <div class="card-body">
                        <h5 class="card-title">Our Team</h5>
                        <p class="card-text">Our team consists of passionate tech experts, writers, and contributors who are
                            dedicated to delivering high-quality content that is accurate, informative, and engaging. With
                            diverse backgrounds and expertise, our team brings a wealth of knowledge and experience to
                            provide our readers with valuable insights and perspectives on various tech topics. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.include.fronted-footer')
@endsection
