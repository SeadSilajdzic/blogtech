@extends('layouts.admin')

@section('content')

    <h2>Products</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Published</th>
            <th>Edit</th>
            <th>Trash</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->title }} image" style="height: 100px; width: 150px;"></td>
                <td><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></td>
                <td>{{ $product->price }}</td>
                <td><a href="{{ route('product.show', $product->slug) }}">{{ $product->published ? 'Published' : 'Not published' }}</a></td>
                <td>
                    <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-info btn-sm" style="color: white;" name="btn_edit_product"><span class="fa fa-pen"></span></a>
                </td>
                <td>
                    <form action="{{ route('product.trash', $product->id) }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-sm btn-danger" name="btn_trash_product"><span class="fa fa-trash"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
