
@extends('backend.layouts.layouts')
@section('admin')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Category</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Category Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" name="name" placeholder="Category Name" >
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
                        <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" checked>
                        <label class="form-check-label" for="employee_active">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0">
                        <label class="form-check-label" for="employee_inactive">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
