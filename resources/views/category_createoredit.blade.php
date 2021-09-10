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
            
        </div>
        <div class="card-body">


            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card">
                    <div class="content-header sty-one">
                        <h1>
                            @if (isset($category))
                                Edit Category
                            @else
                                Create New Category
                            @endif
                        </h1>
                    </div>
                    <div class="card-body">
                        <form id="form-create" method="POST" enctype="multipart/form-data" @if (isset($category))
                            action="{{ route('categories.update', $category) }}">
                            @method('PUT')
                        @else
                            action="{{ route('categories.store') }}">
                            @endif

                            <div class="row">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="firstName1">Category Name:</label>
                                        <input class="form-control" name="name" id="name"
                                            value="{{ $category->name ?? '' }}" type="text"><br>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="firstName1">Description:</label>
                                        <textarea class="form-control" id="description"
                                            name="description">{{ $category->description ?? '' }}</textarea>
                                    </div>
                                </div>


                                <br>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if (isset($category))
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.content -->
                </div>
            </div>


        </div>
    </div>

@endsection
