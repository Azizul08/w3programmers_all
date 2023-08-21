@extends('products.default')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('products.create.step.two.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Step 2: Status & Stock</div>
   
                    <div class="card-body">
   
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
   
                            <div class="form-group">
                                <label for="image">Product Image:</label>
                                <input type="file" value="{{ $product->image?? '' }}" class="form-control" id="image"  name="image">
                            </div>
    
                            <div class="form-group">
                                <label for="price">Product Price:</label>
                                <input type="text" value="{{ $product->price?? '' }}" class="form-control" id="price"  name="price">
                            </div>
   
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('products.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection