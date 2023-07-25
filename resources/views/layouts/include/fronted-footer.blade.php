<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="py-4 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="navbar-brand" href="{{ url('admin/dashboard') }}"><img
                        src="{{ asset('assets/images/logo/Techblog (3).svg') }}" width="150px" alt="Techblog Logo"></a>
                <div class="underline mt-2" style="width: 100px"></div>
                <p>TechBlog is a leading tech-focused website that covers the latest trends, news, and developments in
                    the world of technology.</p>
                <p>Contact us: <a href="mailto:techblog@gmail.com" class="text-danger">techblog@gmail.com</a></p>
            </div>

            <div class="col-md-3">
                <h5>Quick Links</h5>
                <div class="underline"></div>
                <div><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></div>
                <div><a href="{{ route('navbar_pages.aboutus') }}" class="text-white text-decoration-none">About Us</a>
                </div>
                <div><a href="{{ route('navbar_pages.contactus') }}" class="text-white text-decoration-none">Contact
                        Us</a></div>
                <div><a href="{{ route('navbar_pages.services') }}" class="text-white text-decoration-none">Services</a>
                </div>
            </div>

            <div class="col-md-3">
                <h5>Follow Us On</h5>
                <div class="underline"></div>
                <div class="social-media-links ml-auto">
                    <a href="https://www.facebook.com/mayur.lavadiya.10/" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/_mayur.lavadiya__/" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                    <a href="https://in.linkedin.com/in/mayurlavadiya" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-linkedin"></i></a>
                    <a href="https://github.com/mayurlavadiya" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-github"></i></a>
                    <a href="https://dribbble.com/designbymayur" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-2 bg-dark text-center text-white">
    <p class="mb-3">
        &copy; Copyrights at <a href="#" class="text-danger">TechBlog.</a>
        All rights reserved.
        Designed and Developed by: <a href="https://mayurlavadiya.dorik.io/" class="text-danger">Mayur Lavadiya</a>
    </p>
</div>
