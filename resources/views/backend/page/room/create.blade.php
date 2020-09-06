@extends('backend.layouts.layouts') @section('admin')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Room</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input class="form-control @error('room_number') is-invalid @enderror" name="room_number" value="{{old('room_number')}}" type="text" />
                            @error('room_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Room type</label>
                            <select class="form-control @error('roomtype_id') is-invalid @enderror" name="roomtype_id">
                                <option value="">Select Your Option</option>
                                @foreach ($roomtype as $rooms )
                                     <option value="{{$rooms->id}}">{{$rooms->name}}</option>
                                @endforeach
                            </select>
                            @error('roomtype_id')
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
                            <label>AC/Non AC</label>
                            <select class="select form-control" name="ac_non_ac">
                                <option>Select</option>
                                <option>AC</option>
                                <option>Non Ac</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bed Count</label>
                            <select class="select form-control" name="bed">
                                <option>Select Your Bed</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rent</label>
                            <input class="form-control @error('rent') is-invalid @enderror" type="text" name="rent" value="{{old('rent')}}" />
                            @error('rent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Facilitate</label>
                           <textarea cols="30" rows="2" class="form-control" name="food"  value={{old('food')}}></textarea>
                        </div>
                    </div>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" />
                    <label class="custom-file-label">Choose file (Photo)</label>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="4" class="form-control" name="description" value="{{old('description')}}"></textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="employee_active" value="1" checked />
                        <label class="form-check-label" for="employee_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="0" />
                        <label class="form-check-label" for="employee_inactive">
                            Inactive
                        </label>
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
