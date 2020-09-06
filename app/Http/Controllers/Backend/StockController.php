<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Brand;
use App\Model\Item;
use App\Model\Stock;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock=Stock::latest()->with('')->get();
        return view('backend.page.stock.index',compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'single_price' => 'required',
            'quntity' => 'required',
            'item_id' => 'required',
            'total_price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/stock/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $stock=new Stock();
        $stock->category_id=$request->category_id;
        $stock->subcategory_id=$request->subcategory_id;
        $stock->brand_id=$request->brand_id;
        $stock->single_price=$request->single_price;
        $stock->quntity=$request->quntity;
        $stock->item_id=$request->item_id;
        $stock->total_price=$request->total_price;
        $stock->status=$request->status ?? 1;
        $stock->save();
        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
