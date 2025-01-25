<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Users;
use Barryvdh\DomPDF\Facade\Pdf;
class ReportController extends Controller
{
    public function generatePdf() {
        $orders =  Orders::with('users','products')->get();
        $data = [
            'title' => 'Laporan Pesanan',
            'date' => date('d-m-Y'),
            'orders' => $orders,
        ];

       $pdf = PDF::loadview('dashboard.reports.orders',$data);
     
       return $pdf->download('laporan-order.pdf');

      
    }


    public function reportProduct() {
        $products =  Products::with('categories')->get();
   
        $data = [
            'title' => 'Laporan List Product',
            'date' => date('d-m-Y'),
            'products' => $products,
        ];

       $pdf = PDF::loadview('dashboard.reports.products',$data);
     
       return $pdf->download('laporan-products.pdf');

    }

    public function reportCategories()  {
        $categories = Categories::paginate();

        $data = [
            'title' => 'Laporan List Categories',
            'date' => date('d-m-Y'),
            'categories' => $categories,
        ];

       $pdf = PDF::loadview('dashboard.reports.categories',$data);
     
       return $pdf->download('laporan-categories.pdf');
    }

    public function reportUsers()  {
        $users = Users::paginate();

        $data = [
            'title' => 'Laporan List Users',
            'date' => date('d-m-Y'),
            'users' => $users,
        ];

       $pdf = PDF::loadview('dashboard.reports.users',$data);
     
       return $pdf->download('laporan-users.pdf');
    }
}
