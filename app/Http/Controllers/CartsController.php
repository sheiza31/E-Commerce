<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
   

    public function index()
    {
        $carts =Carts::with(['products.categories'])
        ->where('user_id',Session::get('user_id'))
        ->get();
        $product_ids = [];

        foreach ($carts as $cart) {
            $product_ids[] =$cart->products->id;
            Session::put('product_ids',$product_ids);
        }
        return view('pages.cart',compact('carts'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     
      $user_id = Session::get('user_id');
      $product_ids = Session::get('product_ids');
      $qty = $request->input('quantity');


      if (is_array($product_ids) && is_array($qty)) {
        foreach ($product_ids as $index => $product_id) {
            $quantity  = (int) $qty[$index];

            DB::table('cart')
            ->where('user_id',$user_id)
            ->where('product_id',$product_id)
            ->update(['quantity' => $quantity]);

        }
      }
      

      $carts = Carts::where('user_id', $user_id)->get();  


      if ($carts->isEmpty()) {
        return redirect()->back()->with('error', 'Keranjang Kosong');
    }

    DB::beginTransaction();

    try {
        // Ambil semua product_id dari keranjang
        $product_ids = $carts->pluck('product_id')->toArray();
        // Ambil data produk yang sesuai dengan product_id
        $products = Products::whereIn('id', $product_ids)->get()->keyBy('id');

        // Kurangi stok dan cek ketersediaan
        foreach ($carts as $cart) {
            $product = $products[$cart->product_id];
           
            if ($product->stock < $cart->quantity) {
                
                return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk jumlah yang dipesan.');
               
            }
            
               $orders = new Orders();
               $orders->user_id = $user_id;
               $orders->product_id = $cart->product_id;
               $orders->Jumlah = $cart->quantity ;
               $orders->total_price = $product->price * $cart->quantity;
               $orders->save();

                 // Kurangi stok
            $product->stock -= $cart->quantity;
            $product->save();      
            
        }


        
        Carts::where('user_id', $user_id)->delete();
        DB::commit();
        return redirect()->route('checkouts');
     } catch (\Throwable $e) {
        
            DB::rollBack();
            return redirect()->back()->with('fail', 'Terjadi kesalahan, silakan coba lagi');
        }
}

    /**
     * Display the specified resource.
     */
    public function show($id,Carts $carts)
    {
        $products = Products::find($id);
        $user_id  = Session::get('user_id');
        if (!$user_id) {
            return to_route('login');
        }
        $quantity = 1;
        $carts = new Carts();
        $carts->user_id = $user_id;
        $carts->product_id = $products->id;
        $carts->quantity = $quantity;
        $carts->save();


        return to_route('carts.index');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Carts $carts)
    {
        $products = Products::find($id);
    
        $user_id = Session::get('user_id');
        $products->carts()->where('user_id',$user_id)->delete();
        

        return to_route('carts.index');
    }
}
