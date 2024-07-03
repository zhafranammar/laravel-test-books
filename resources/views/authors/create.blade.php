@extends('app')

@section('title', 'Add Author')

@section('content')
<div class="container">
    <h2>Add Author</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Author</button>
    </form>
</div>
@endsection
