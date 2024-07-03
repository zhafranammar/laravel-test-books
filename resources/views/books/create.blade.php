@extends('app')

@section('title', 'Add Book')

@section('content')
<div class="container">
    <h2>Add Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" class="form-control" id="serial_number" name="serial_number" required>
        </div>
        <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="date" class="form-control" id="published_at" name="published_at" required>
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <select class="form-control select2" id="author_id" name="author_id" required>
                <option value="">Select Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>

</div>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
