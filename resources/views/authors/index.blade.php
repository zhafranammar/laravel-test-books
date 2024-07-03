@extends('app')

@section('title', 'Authors')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">List Authors</h1>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-between mb-5">
            <div class="col-auto">
                <a href="{{ route('authors.create') }}" class="btn btn-success">Add Author</a>
            </div>
        </div>
    </div>

    <table id="authors-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td>
                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger delete-author" data-toggle="modal" data-target="#deleteAuthorModal" data-id="{{ $author->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAuthorModal" tabindex="-1" role="dialog" aria-labelledby="deleteAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAuthorModalLabel">Delete Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this author?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#authors-table').DataTable();
    $('body').on('click', '.delete-author', function() {
        var authorId = $(this).data('id');
        $('#confirmDelete').data('id', authorId);
    });

    $('#confirmDelete').on('click', function() {
        var authorId = $(this).data('id');
        $.ajax({
            url: `/authors/${authorId}`,
            method: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Menghapus baris tabel tanpa reload halaman
                $('#authors-table').DataTable().row($('#authors-table').find('button[data-id="' + authorId + '"]').closest('tr')).remove().draw(false);
                $('#deleteAuthorModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error deleting author.');
            }
        });
    });
});
</script>

@endsection
