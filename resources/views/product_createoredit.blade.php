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

        </div>
        <div class="card-body">


            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card justify-content-center">
                    <div class="content-header sty-one">
                        <h1>
                            @if (isset($product))
                                Edit Products
                            @else
                                Create New Products
                            @endif
                        </h1>
                    </div>
                    <div class="card-body">
                        <form id="form-create" method="POST" enctype="multipart/form-data" @if (isset($product))
                            action="{{ route('products.update', $product) }}">
                            @method('PUT')
                        @else
                            action="{{ route('products.store') }}">
                            @endif

                            @csrf

                            @if (isset($product))

                            @else
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="location1">category:</label>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select class=" form-control" name="category_id" id="category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id ?? '' }}">
                                                            {{ $category->id }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstName1">Name:</label>
                                    <input class="form-control" name="name" id="name" value="{{ $product->name ?? '' }}"
                                        type="text"><br>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstName1">Description:</label>
                                    <textarea class="form-control" id="description"
                                        name="description">{{ $product->description ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="firstName1">Upload Product Image</label>
                                    <input type="file" name="image" @if (isset($product))
                                    value=" {{ $product->image }}"
                                    @endif
                                    />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstName1">Price:</label>
                                    <input class="form-control" name="price" id="price"
                                        value="{{ $product->price ?? '' }}" type="text"><br>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><strong>Tags :</strong></label><br>
                                    <label><input type="checkbox" name="tags[]" value="Sports "> Sports</label>
                                    <label><input type="checkbox" name="tags[]" value="Regular "> Regular</label>
                                    <label><input type="checkbox" name="tags[]" value="Seasonal "> Seasonal</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><strong>Type :</strong></label><br>

                                    <input class="form-group" type="radio" name="type" id="man" value="man "
                                        @if (isset($product))
                                    {{ $product->type == 'man' ? 'checked' : '' }}>
                                @else
                                    >
                                    @endif

                                    <label class="form-group" for="Radio1">
                                        man
                                    </label>
                                    <input class="form-group" type="radio" name="type" id="woman" value="woman"
                                        @if (isset($product))
                                    {{ $product->type == 'woman' ? 'checked' : '' }}>
                                @else
                                    >
                                    @endif
                                    <label class="form-group" for="Radio2">
                                        woman
                                    </label>
                                </div>
                            </div>


                            <br>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if (isset($product))
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
