@extends('app')

@section('title', 'Book Details')

@section('content')
<div class="container">
    <h2>Book Details</h2>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" disabled>
    </div>
    <div class="form-group">
        <label for="serial_number">Serial Number</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ $book->serial_number }}" disabled>
    </div>
    <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="date" class="form-control" id="published_at" name="published_at" value="{{ $book->published_at }}" disabled>
    </div>
    <div class="form-group">
        <label for="author_id">Author</label>
        <select class="form-control" id="author_id" name="author_id" disabled>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('books.edit',$author->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
