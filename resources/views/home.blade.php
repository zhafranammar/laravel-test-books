@extends('app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="https://cdn-icons-png.freepik.com/512/5520/5520808.png" class="card-img-top" style="height: 500px; object-fit: cover;" alt="Author Image">
                <div class="card-body">
                    <h5 class="card-title">Authors</h5>
                    <p class="card-text">Explore our diverse collection of authors and their works. Find out more about their stories and inspirations.</p>
                    <a href="{{ route('authors.index') }}" class="btn btn-primary">View Authors</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="https://www.creativefabrica.com/wp-content/uploads/2023/03/06/Stacked-book-icon-Library-symbol-Books-Graphics-63460114-1-580x387.png" class="card-img-top" style="height: 500px; object-fit: cover;" alt="Book Image">
                <div class="card-body">
                    <h5 class="card-title">Books</h5>
                    <p class="card-text">Discover a world of books waiting to be explored. From classics to modern tales, there's something for everyone.</p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">View Books</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
