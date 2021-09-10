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
            <h1 class="text-center">categories</h1>
            <a type="button" class="btn btn-success btn-lg float-right" href="{{ route('categories.create') }}"
                class="btn btn-primary">Add Categorys</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>

                                <td>{{ $category->name }}</td>
                                <td>
                                    {{ $category->description }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" type="button"
                                        class="btn btn-success btn-sm"> edit

                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"> delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
