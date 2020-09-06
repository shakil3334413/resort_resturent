@extends('backend.layouts.layouts') @section('admin')

<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Room</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('room.update',$room->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Room Number</label>
                            <input class="form-control @error('room_number') is-invalid @enderror" name="room_number" value="{{$room->room_number}}" type="text" />
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
                                     <option value="{{$rooms->id}}"  {{$rooms->id == $room->roomtype_id ? 'selected' : ''}}>{{$rooms->name}}</option>
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
                                <option {{$room->ac_non_ac == 'AC' ? 'selected' : ''}}>AC</option>
                                <option {{$room->ac_non_ac =='Non Ac' ? 'selected' : ''}}>Non Ac</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bed Count</label>
                            <select class="select form-control" name="bed">
                                <option>Select Your Bed</option>
                                <option {{$room->bed == '1' ? 'selected' : ''}}>1</option>
                                <option {{$room->bed == '2' ? 'selected' : ''}}>2</option>
                                <option {{$room->bed == '3' ? 'selected' : ''}}>3</option>
                                <option {{$room->bed == '4' ? 'selected' : ''}}>4</option>
                                <option {{$room->bed == '5' ? 'selected' : ''}}>5</option>
                                <option {{$room->bed == '6' ? 'selected' : ''}}>6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rent</label>
                            <input class="form-control @error('rent') is-invalid @enderror" type="text" name="rent" value="{{$room->rent}}" />
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
                        <textarea cols="30" rows="2" class="form-control" name="food"  value={{$room->food}}>{{$room->food}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" />
                <input type="hidden" name="old_image" value="{{$room->image}}">
                    <label class="custom-file-label">Choose file (Photo)</label>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="4" class="form-control" name="description" value="{{old('description')}}">{{$room->description}}</textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$room->status == 1 ? 'checked' : '' }} type="radio" name="status" id="employee_active" value="1" checked />
                        <label class="form-check-label" for="employee_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$room->status == 0 ? 'checked' : '' }} type="radio" name="status" id="employee_inactive" value="0" />
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

