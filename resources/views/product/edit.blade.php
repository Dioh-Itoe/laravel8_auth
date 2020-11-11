<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <link href="{{ asset('/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<div class="container">
    <form action="{{ route('update-product', $product->id) }}" method="post" enctype = "multipart/form-data" class="mt-5">
        <h2>Edit Product/Service</h2>
        @csrf
            <div class="form-row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="product name">Product Name</label>
                        <input type="text" name="product_name" @error('product_name') is-invalid @enderror value="{{ $product->product_name }}"  class="form-control name" autocomplete="off" >
                        @error('product_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="">{{ $product->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="product image">Current Image</label>
                        <img src="{{  json_decode($product->imageable['product_image'])[0] ?? 'https://p.kindpng.com/picc/s/197-1971165_blog-icon-iso-blogging-icon-hd-png-download.png'  }}" alt="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                       <label for="product image">Update Image</label>
                        <input type="file" name="product_image" id="input-file-now" class="dropify"/>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="price">Price (FCFA)</label>
                    <input type="number" name="price" @error('price') is-invalid @enderror value="{{ $product->price }}" class="form-control" autocomplete="off" >
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <label for="discount" class="pull-left">This item is on discount: </label>
                    <input type="checkbox" name="on_discount" {{ $product->on_discount == '1' ? 'checked' : '' }} @error('on_discount') is-invalid @enderror class="pull-right" checked>
                    @error('on_discount')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-row"> --}}
                <div class="form-group">
                    <label for="product name">Condition</label>
                    <input type="text" name="condition" @error('condition') is-invalid @enderror value="{{ $product->condition }}" class="form-control name" autocomplete="off" >
                    @error('condition')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

            {{-- </div> --}}
            <div class="form-row">
                <div class="col-md-4">
                    <label for="service" class="pull-left">This item is a service <span><i class="fa fa-question-circle"></i></span> : </label>
                    <input type="checkbox" name="is_service" {{ $product->is_service == '1' ? 'checked' : '' }} @error('is_service') is-invalid @enderror value="0" class="pull-right">
                    @error('is_service')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="service" class="pull-left">In Stock <span><i class="fa fa-question-circle"></i></span> : </label>
                    <input type="checkbox" name="in_stock" {{ $product->in_stock == '1' ? 'checked' : '' }} @error('in_stock') is-invalid @enderror value="1" class="pull-right" checked>
                    @error('in_stock')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label for="publish" class="pull-left">Published <span><i class="fa fa-question-circle"></i></span> : </label>
                    <input type="checkbox" name="published" {{ $product->published == '1' ? 'checked' : '' }} @error('published') is-invalid @enderror value="1" class="pull-right" checked>
                    @error('published')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

        <div class="justify-content-center">
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </div>
    </form>
</div>
<script src="{{ asset('/plugins/dropify/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
</x-app-layout>
