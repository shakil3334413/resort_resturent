@extends('backend.layouts.layouts') @section('admin')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Stock</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('stock.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control dynamic @error('category_id') is-invalid @enderror" name="category_id"
                            data-dependent="subcategory" required id="category">
                                <option value="">Select Your Category</option>
                                @if(isset($category) && !empty($category))
                                    @foreach ($category as $cat )
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select class="form-control" name="subcategory_id" id="subcategory">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" name="brand_id">
                                <option value="">Select Your Brand</option>
                                @if(isset($brand) && !empty($brand))
                                    @foreach ($brand as $brands )
                                        <option value="{{$brands->id}}">{{$brands->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit Price</label>
                            <input class="form-control @error('single_price') is-invalid @enderror" type="text" name="single_price" value="{{old('single_price')}}" />
                            @error('single_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quentity</label>
                            <input class="form-control @error('quntity') is-invalid @enderror" type="text" name="quntity" value="{{old('quntity')}}" />
                            @error('quntity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Quentity Type</label>
                            <select class="form-control @error('item_id') is-invalid @enderror" name="item_id">
                                <option value="">Select Your Quentity Type</option>
                                @if(isset($item) && !empty($item))
                                    @foreach ($item as $items )
                                        <option value="{{$items->id}}">{{$items->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('item_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn" type="submit">Save</button>
                    <button class="btn btn-danger submit-btn" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
