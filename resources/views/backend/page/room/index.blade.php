
@extends('backend.layouts.layouts') @section('admin')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Room</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{route('room.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Room</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="datatable table table-stripped">
                    <thead>
                        <tr>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Ac/Non Ac</th>
                            <th>Bed</th>
                            <th>Rent</th>
                            <th>Facilati</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($room as $cat)
                        <tr>

                            <td>{{$cat->room_number}}</td>
                            <td>{{$cat->roomtype->name}}</td>
                            <td>{{$cat->ac_non_ac}}</td>
                            <td>{{$cat->bed}}</td>
                            <td>{{$cat->rent}}</td>
                            <td>{{$cat->food}}</td>
                            <td>{{$cat->description}}</td>
                            <td><img src="{{asset('rooms/'.$cat->image)}}" class="img-thumbnail" style="width: 100px;height: 100px;"/></td>
                            @if($cat->status==1)
                             <td>Active</td>
                             @else
                             <td>InActive</td>
                            @endif
                            <td class="text-right">
                            <a class="" href="{{route('room.edit',$cat->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                <form action="{{route('room.destroy',$cat->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none;border:none;cursor: pointer;"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                    {{-- <a type="submit" style="cursor: pointer"><i class="fa fa-trash-o m-r-5"></i> Delete</a> --}}
                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

