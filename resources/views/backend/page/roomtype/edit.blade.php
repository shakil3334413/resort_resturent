
@extends('backend.layouts.layouts')
@section('admin')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Room Type</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
        <form action="{{route('room_type.update',$roomtype->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Room Type <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{$roomtype->name}}" name="name" placeholder="Category Name" >
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
                        <input class="form-check-input" {{$roomtype->status == 1 ? 'checked' : '' }} type="radio" name="status" id="employee_active" value="1" >
                        <label class="form-check-label" for="employee_active">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$roomtype->status == 0 ? 'checked' : '' }}  type="radio" name="status" id="employee_inactive" value="0">
                        <label class="form-check-label" for="employee_inactive">
                        Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Edit Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
