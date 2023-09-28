<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Edit Product </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('products.list') }}" enctype="multipart/form-data">
                            Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>product size:</strong>
                            <input type="text" name="product_size" value="{{ $product->product_size }}" class="form-control"
                                placeholder="product size">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                                placeholder="Name">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                placeholder="Price">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            <input type="text" name="description" value="{{ $product->description }}" class="form-control"
                                placeholder="Description">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="text" name="image" value="{{ $product->image }}" class="form-control"
                                placeholder="Image">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Brand Name:</strong>
                            <select name="brand_id" class="form-control" placeholder = "Brand Name">
                                @foreach ($brands as $item)
                                    <option value="{{$item->id}}"
                                        @if ($item->id == $product->brand_id) selected = "selected" @endif >
                                        {{$item->brand_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Category Name:</strong>
                            <select name="category_id" class="form-control" placeholder = "Category Name">
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}"
                                        @if ($item->id == $product->category_id) selected = "selected" @endif >
                                        {{$item->category_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    </body>
    
    </html>
    </x-app-layout>