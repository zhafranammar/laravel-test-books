@extends('app')

@section('title', 'Author Details')

@section('content')
<div class="container">
    <h2>Author Details</h2>
     <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" disabled>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}" disabled>
    </div>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
