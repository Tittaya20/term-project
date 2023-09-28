<?php
 
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class CategoryChartController extends Controller
{
    public function index2(){
       $category_total_price = DB::table('category')
        ->join('products','category.id','=','products.category_id')
        ->selectRaw("sum(price*product_size) as category_total_price,category_name")
        ->groupBy(DB::raw("category_name"))
        ->pluck("category_total_price","category_name");
        $labels = $category_total_price->keys();
        $data = $category_total_price->values();
 
        return view("category.category_chart",compact("labels","data"));
    }
}