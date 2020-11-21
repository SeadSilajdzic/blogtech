@extends('layouts.admin')

@section('content')

    <h2>Trashed products</h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Restore</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->title }} image" style="height: 100px; width: 150px;"></td>
                <td><a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a></td>
                <td>{{ $product->price }}</td>
                <td>
                    <form action="{{ route('product.restore', $product->id) }}" method="post">
                        @csrf

                        <button type="submit" name="btn_restore_product" class="btn btn-sm btn-success"><span class="fa fa-trash-restore"></span></button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-sm btn-danger" name="btn_trash_product"><span class="fa fa-trash"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
