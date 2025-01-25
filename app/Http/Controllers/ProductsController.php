<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public  $name,$desc,$image
           ,$price,$stock,$categories;

    public function index()
    {
        $categories = categories::paginate();
        $products = Products::with('categories')->get();
       
        return view('dashboard.products.index',compact('products','categories'));
    }

 
    public function searchProducts(Request $request)  {
        $search = $request->search;
        $categories = categories::paginate();
        $products = Products::with('categories')->where('product_name','LIKE',"%{$search}%")
        ->orWhereHas('categories',function ($query) use ($search) {
            $query->where('name','LIKE',"%{$search}%");
        })->get();


        return view('pages.shop',compact('categories','products'));
        
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $validate = $request->validated();
        $product_name = $this->name = $validate['product_name'];
        $desc = $this->desc = $validate['description'];
        $image = $this->image = $validate['image'];
        $price = $this->price = intval( $validate['price']);
        $stock = $this->stock = $validate['stock'];
        $categories = $this->categories = $validate['category_id'];

        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('files/products/image', request()->file('image'));
            $image = $filePath;
        }

        $products = new Products();
        $products->product_name = $product_name;
        $products->description = $desc;
        $products->image = $image;
        $products->price = $price;
        $products->stock = $stock;
        $products->category_id = $categories;
        $products->save();

        return to_route('products.index')->with('success','Data Berhasil Disimpan');
    }

    public function searchProduct(Request $request) {
        
        $search = $request->search;
        $categories = categories::paginate();
        $products = Products::with('categories')->where('product_name','LIKE',"%{$search}%")
        ->orWhereHas('categories',function ($query) use ($search) {
            $query->where('name','LIKE',"%{$search}%");
        })->paginate();

        return view('dashboard.products.index',compact('categories','products'));
      }
    public function show(string $id,Products $products)
    {
        $categories = Categories::paginate();
        $products =Products::with('categories')->find($id);

        // Cari produk sebelumnya (ID lebih kecil)
            $back_products = Products::where('id', '<', $id)
            ->orderBy('id', 'desc')
            ->first();
            $next_products = Products::where('id', '>', $id)
                                ->orderBy('id', 'asc')
                                ->first();
        return view('pages.single-product',compact('products','categories','back_products','next_products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Products $products)
    {
        $products = Products::find($id);
        $categories = Categories::paginate();
        return view('dashboard.products.edit_products',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id,UpdateProductsRequest $request, Products $products)
    {
        $validate = $request->validated();
        $products = Products::find($id);
        $product_name = $this->name = $validate['product_name'];
        $desc = $this->desc = $validate['description'];
        $image = $this->image = $validate['image'];
        $price = $this->price = intval( $validate['price']);
        $stock = $this->stock = $validate['stock'];
        $categories = $this->categories = $validate['category_id'];

        if ($request->hasFile('image')) {
            if (isset($products->image)) {
                Storage::disk('public')->delete($products->image);
            }
            $filePath = Storage::disk('public')->put('files/products/image', request()->file('image'), 'public');
            $image = $filePath;
        }


       
        $products->product_name = $product_name;
        $products->description = $desc;
        $products->image = $image;
        $products->price = $price;
        $products->stock = $stock;
        $products->category_id = $categories;
        $products->save();

        return to_route('products.index')->with('success','Data Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Products $products)
    {
        $products = Products::find($id);
        if (isset($products->image)) {
            Storage::disk('public')->delete($products->image);
        }
        $products->delete();

        return to_route('products.index')->with('success','Data Berhasil Dihapus');
    }
}
