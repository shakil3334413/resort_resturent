<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Model\SubCategory;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=SubCategory::latest()->with('category')->get();
        return view('backend.page.subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::latest()->where('status','=',1)->get();
        return view('backend.page.subcategory.create',compact('category'));
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
            'name' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/subcategory/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $subcategory=new SubCategory();
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->status=$request->status ?? 1;
        $subcategory->save();
        return redirect()->route('subcategory.index');
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
        $category=Category::latest()->where('status','=',1)->get();
        $subcategory=SubCategory::find($id);
        if($subcategory){

            return view('backend.page.subcategory.edit',compact('subcategory','category'));
        }else{
            return redirect()->back();
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/subcategory/{subcategory }/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $subcategory=SubCategory::find($id);
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->status=$request->status ?? 1;
        $subcategory->save();
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=SubCategory::find($id);
        if($subcategory){

            $subcategory->delete();
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
