<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
 
    public string $name;
    
    public function index()
    {
        $categories = Categories::paginate();
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        return to_route('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        $validate = $request->validated();
        $categories = $this->name = $validate['name'];
        $categories_obj = new Categories();
        $categories_obj->name = $categories;
        $categories_obj->save();

        return to_route('categories.index')->with('success','Data Berhasil Ditambahkan');
        
    }

   public function searchCategories(Request $request) {
   $search = $request->search;
   $categories = Categories::where('name','LIKE',"%{$search}%")->paginate();

   return view('dashboard.categories.index',compact('categories'));
   }
    public function show(string $name,categories $categories)
    {
        
        $products = Products::whereHas('categories', function ($query) use ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        })->get();

        $categories = Categories::paginate();
       
        return view('pages.shop',compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,categories $categories)
    {
        $categories = Categories::find($id);
        return view('dashboard.categories.edit_categories',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,UpdatecategoriesRequest $request, Categories $categories)
    {
        $validate = $request->validated();
        $categories = Categories::find($id);
        $categories_name = $this->name = $validate['name'];
        $categories->name = $categories_name;
        $categories->save();

        return to_route('categories.index')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Categories $categories)
    {
       $categories = Categories::find($id);
       $categories->delete();

       return to_route('categories.index')->with('success','Data Berhasil Dihapus');
    }
}
