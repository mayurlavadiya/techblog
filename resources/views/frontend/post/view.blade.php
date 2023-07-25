@extends('layouts.app')
@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")

@section('content')

    {{-- @auth --}}
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <a class="btn btn-primary mb-4" href="{{ url()->previous() }}">Back</a>
                        <div class="category-heading">
                            <h3 style="font-weight:bold;">Title : {!! $post->name !!}</h3>
                        </div>

                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <div class="mt-3">
                                    <h5 style="color:crimson; font-weight:bold; text-decoration:underline;">Category Name :</h5>
                                    {{ $post->category->name }}
                                </div>
                                <div class="mt-3 post-description">
                                    <h5 style="color:crimson; font-weight:bold; text-decoration:underline;">Post Description:
                                    </h5>
                                    {!! $post->description !!}
                                </div>

                                <div class="mt-3">
                                    <img src="{{ asset('upload/post/' . $post->image) }}" width="50%" height="50%"
                                        alt="cimage">
                                </div>
                            </div>
                        </div>

                        <div class="comment-area mt-4">
                            @if (session('message'))
                                <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                            @endif
                            <div class="card card-body">
                                <h5 style="color:crimson; font-weight:bold;">Leave a comment</h5>
                                <form action="{{ url('comments') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>

                            @forelse ($post->comments as $comment)
                                <div class="card card-body shadow-sm mt-3">
                                    <div class="detail-area">
                                        <h6 class="user-name mb-1">
                                            @if ($comment->user)
                                                <b>Commented By :</b> {{ $comment->user->name }}
                                            @endif
                                            <small class="ms-3 text-secondary"><b>Comment On :</b> {{ $comment->created_at->format('d-m-Y') }}</small>
                                        </h6>
                                        <p class="user-comment mb-1">
                                            {!! $comment->comment_body !!}
                                        </p>
                                    </div>

                                    @if (Auth::check() && Auth::id() == $comment->user_id)                               
                                    <div>
                                        <a href="" class="btn btn-primary mt-3">Edit</a>
                                        <button type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger mt-3">Delete</button>
                                    </div>
                                    @endif
                                </div>
                            @empty
                                <h6 style="color: rgb(85, 85, 85)">No any comments !</h6>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="margin-top: 4rem !important">
                            <div class="card-header">
                                <h4>Latest Posts</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($latest_post as $latest_post_item)
                                    <a href="{{ url('categories/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                        class="text-decoration-none">
                                        <h6> > {{ $latest_post_item->name }}</h6>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @else
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h2>
                                    {{ __('Login or Register') }}
                                </h2>
                            </div>
                            <div class="card-body">
                                <p>{{ __('Please log in or register to view the post details.') }}</p>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-primary mr-3" href="{{ route('login') }}">{{ __('Login') }}</a> &nbsp;
                                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth --}}
    @include('layouts.include.fronted-footer')

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $(document).on('click', '.deleteComment', function () {
            var commentId = $(this).val();
            if (confirm("Are you sure you want to delete this comment?")) {
                // Send an AJAX request to the server to delete the comment
                $.ajax({
                    url: "{{ url('comments') }}/" + commentId,
                    type: "DELETE",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "comment_id": commentId
                    },
                    success: function (response) {
                        // If the comment is deleted successfully, remove it from the DOM
                        $("#comment-" + commentId).remove();
                        alert("Comment deleted successfully!");
                    },
                    error: function (xhr) {
                        // Handle errors if the comment deletion fails
                        alert("Failed to delete comment. Please try again later.");
                    }
                });
            }
        });
    });
</script>
@endsection
