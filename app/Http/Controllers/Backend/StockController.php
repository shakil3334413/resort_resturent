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
use DB;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock=Stock::latest()->with('category','subcategory','brand','item')->get();
        // return $stock;
        return view('backend.page.stock.index',compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $category=Category::latest()->where('status','=',1)->get();
        $subcategory=SubCategory::latest()->where('status','=',1)->get();
        $brand=Brand::latest()->where('status','=',1)->get();
        $item=Item::latest()->where('status','=',1)->get();
        return view('backend.page.stock.create',compact('category','subcategory','brand','item'));
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
        $stock->total_price=$request->quntity * $request->single_price;
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


    public function dynamicsubcategoryFetch(Request $request){
        $select = $request->get('select');
        $category_id = $request->get('category_id');
        $dependent = $request->get('dependent');
        $data = DB::table('sub_categories')
           ->where($select, $category_id)
           ->groupBy($dependent)
           ->get();
         $output = '<option value="">Select '.ucfirst($dependent).'</option>';
         foreach($data as $row)
         {
          $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
         }
         echo $output;
        }
        public function stock(){
            return view('backend.page.stock.create');
        }
    
        public function getsubcategory($category){
            return DB::table('sub_categories')->where('category_id',$category)->get();
        }

}
