@extends('layouts.app')

@section('content')
<div class="container my-3 bg-light">
    <div class="col-md-12 text-center">
        <a type="button" href="{{ route('categories.index') }}" class="btn btn-primary">Categorys</a>
        <a type="button" href="{{ route('products.index') }}" class="btn btn-warning">Products</a>
    </div>
</div>

<div class="card">
    <div class="content-header sty-one">
        <h1 class="text-center">products</h1>
        <a type="button"  class="btn btn-success btn-lg float-right" href="{{ route('products.create') }}"  class="btn btn-primary">Add Products</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th >Category</th>
                        <th >Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ asset('img/products/').'/'. $product->image  }}"
                                            class="img-thumbnail" style="width: 50px; width: 50px;" alt="image" /></td>

                            <td>{{ $product->name }}</td>
                            <td >{{ $product->category_id }}</td>
                            <td >{{ $product->type }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" type="button"
                                    class="btn btn-success btn-sm">
                                   edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">delete </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th >Category</th>
                        <th >Type</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@endsection
