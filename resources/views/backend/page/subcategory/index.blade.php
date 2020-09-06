@extends('backend.layouts.layouts') @section('admin')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Sub Category</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{route('subcategory.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Sub Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th style="min-width: 200px;">Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $cat)
                        <tr>

                            <td>{{$cat->category->name}}</td>
                            <td>{{$cat->name}}</td>
                            @if($cat->status==1)
                             <td>Active</td>
                             @else
                             <td>InActive</td>
                            @endif
                            <td class="text-right">
                            <a class="" href="{{route('subcategory.edit',$cat->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                <form action="{{route('subcategory.destroy',$cat->id)}}" method="POST">
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
