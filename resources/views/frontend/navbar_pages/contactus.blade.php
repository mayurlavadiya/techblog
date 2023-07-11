@section('title', 'Techblog - Contact Us')
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
    <h2 class="card-title">Contact Us</h2>
    <hr>
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Send us a message</h5>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.include.fronted-footer')
@endsection
