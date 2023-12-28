@extends('layouts.head')
@section('content')
    <div class="create">
        <form action="/create" method="POST">
            @csrf
            <label for="url">Image Url</label>
            <input type="text" name="url">
            <label for="name">Product name</label>
            <input type="text" name="name">
            <label for="details">Description</label>
            <input type="text" name="details" id="">
            <label for="instock">In Stock</label>
            <input type="text" name="instock">
            <label for="price">Price</label>
            <input type="text" name="price">
            <button>Submit</button>
        </form>
    </div>
@endsection