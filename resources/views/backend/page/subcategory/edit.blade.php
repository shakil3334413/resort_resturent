
@extends('backend.layouts.layouts')
@section('admin')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit SubCategory</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Select Category Name <span class="text-danger">*</span></label>
                            <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach ($category as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id == $subcategory->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>SubCategory Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{$subcategory->name}}" name="name" placeholder="SubCategory Name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$subcategory->status == 1 ? 'checked' : '' }} type="radio" name="status" id="employee_active" value="1" checked>
                        <label class="form-check-label" for="employee_active">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$subcategory->status == 0 ? 'checked' : '' }} type="radio" name="status" id="employee_inactive" value="0">
                        <label class="form-check-label" for="employee_inactive">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Update SubCategory</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
