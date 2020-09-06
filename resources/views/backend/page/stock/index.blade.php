@extends('backend.layouts.layouts') @section('admin')
<div class="content">
    <div class="row">
        <div class="col-sm-8 col-6">
            <h4 class="page-title">All Stock</h4>
        </div>
        <div class="col-sm-4 col-6 text-right m-b-30">
            <a href="{{route('stock.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Stock</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group">
                <label class="">Input</label>
                <input type="text" class="form-control" />
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group">
                <label class="">Leave Type</label>
                <select class="form-control">
                    <option> -- Select -- </option>
                    <option>Casual Leave</option>
                    <option>Medical Leave</option>
                    <option>Loss of Pay</option>
                </select>
            </div>
        </div>
        
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group">
                <label class="">From</label>
                <div class="cal-icon">
                    <input class="form-control datetimepicker" type="text" />
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group">
                <label class="">To</label>
                <div class="cal-icon">
                    <input class="form-control datetimepicker" type="text" />
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mt-4">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Brand</th>
                            <th>Unit Price</th>
                            <th>Quntity</th>
                            <th>Quntity Type</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(isset($stock) && !empty($stock))
                             @foreach ($stock as $stocks )
                        <tr>
                            <td>{{$stocks->category->name}}</td>
                            <td>{{$stocks->subcategory->name}}</td>
                            <td>{{$stocks->brand->name}}</td>
                            <td>{{$stocks->single_price}}</td>
                            <td>{{$stocks->quntity}}</td>
                            <td>{{$stocks->item->item_id}}</td>
                            <td>{{$stocks->total_price}}</td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-leave.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" title="Decline" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
