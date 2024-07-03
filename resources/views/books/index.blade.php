@extends('app')

@section('title', 'Books')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">List Books</h1>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-between mb-5">
            <div class="col-auto">
                <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
            </div>
        </div>
    </div>

    <table id="books-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Serial Number</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ strlen($book->title) > 25 ? substr($book->title, 0, 25) . '...' : $book->title }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->serial_number }}</td>
                <td>{{ $book->published_at }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger delete-book" data-toggle="modal" data-target="#deleteBookModal" data-id="{{ $book->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBookModalLabel">Delete Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this book?</p>
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
    $('#books-table').DataTable();
    $('body').on('click', '.delete-book', function() {
        var bookId = $(this).data('id');
        $('#confirmDelete').data('id', bookId);
    });

    $('#confirmDelete').on('click', function() {
        var bookId = $(this).data('id');
        $.ajax({
            url: `/books/${bookId}`,
            method: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Menghapus baris tabel tanpa reload halaman
                $('#books-table').DataTable().row($('#books-table').find('button[data-id="' + bookId + '"]').closest('tr')).remove().draw(false);
                $('#deleteBookModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error deleting book.');
            }
        });
    });
});
</script>

@endsection
