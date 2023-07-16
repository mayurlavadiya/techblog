@section('title', 'Techblog - Services')
@extends('layouts.app')

@section('content')

<style>
    .service-item {
        background-color: #f8f9fa;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .service-item h3 {
        margin-bottom: 10px;
        font-size: 24px;
    }

    .service-item p {
        margin-bottom: 20px;
        font-size: 16px;
        line-height: 1.6;
    }
</style>

<div class="container">
    <h2 class="mb-4">Our Services</h2>
    <hr>
    <div class="mb-4">
        <h5 class="card-title">What We Offers</h5>
        <div class="underline"></div>
        <p class="card-text mt-2">At TechBlog, we provide a range of services tailored to meet the needs of our readers and clients. Our team of experts is dedicated to delivering high-quality solutions and experiences in the following areas:</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="service-item">
                <h3>Technology News</h3>
                <p>Stay up-to-date with the latest technology news and trends from around the world. We provide timely and accurate news coverage to keep you informed.</p>
            </div>
            <div class="service-item">
                <h3>Product Reviews</h3>
                <p>Get detailed reviews and insights on the latest gadgets, smartphones, and tech products. Our experts thoroughly test and evaluate each product to provide honest and unbiased reviews.</p>
            </div>
            <div class="service-item">
                <h3>Tutorials and How-To Guides</h3>
                <p>Learn how to make the most of your devices and software with our step-by-step tutorials and guides. We cover a wide range of topics to help you enhance your tech skills.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="service-item">
                <h3>Tech Tips and Tricks</h3>
                <p>Discover useful tips and tricks to enhance your tech skills and improve productivity. Our tips cover various aspects of technology, from software shortcuts to hardware optimizations.</p>
            </div>
            <div class="service-item">
                <h3>Industry Analysis</h3>
                <p>Gain valuable insights into the tech industry with our in-depth analysis and expert opinions. We analyze market trends, emerging technologies, and business strategies to keep you informed.</p>
            </div>
            <div class="service-item">
                <h3>Expert Advice</h3>
                <p>Consult with our tech experts to get personalized recommendations and solutions for your tech-related queries. Our team is here to assist you and provide expert guidance.</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.include.fronted-footer')
@endsection
