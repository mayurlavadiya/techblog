@extends('layouts.master')

@section('title', 'Admin / Category View')
@section('content')

    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete-category/') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category with its Post </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_delete_id" id="category_id">
                        <h5>Are you sure you want to delete this Category with all its posts ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
        <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-md float-end">Add Category</a>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">View Blog Category </li>
        </ol>

        <div class="card">
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table id="myDatatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Navbar Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('upload/category/' . $item->image) }}" width="100px" height="70px"
                                        alt="cimage">
                                </td>
                                <td style="color: {{ $item->status == '1' ? 'green' : 'red' }}; font-weight: bold;">
                                    {{ $item->status == '1' ? 'Active' : 'Inctive' }}
                                </td>
                                <td style="color: {{ $item->navbar_status == '1' ? 'green' : 'red' }}; font-weight: bold;">
                                    {{ $item->navbar_status == '1' ? 'Active' : 'Inctive' }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-category/' . $item->id) }}" class="btn btn-success">Edit</a>
                                    {{-- <a href="{{ url('admin/delete-category/' . $item->id) }}"
                                        class="btn btn-danger">Delete</a> --}}

                                    <button type="button" class="btn btn-danger deleteCategoryBtn"
                                        value="{{ $item->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();

                var category_id = $(this).val();
                $('#category_id').val(category_id)
                $('#deletemodal').modal('show');
            });
        });
    </script>
@endsection
