<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCategory;
use App\User;
use Session;
use App\Card;
use Auth;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
	    //
    public function getIndex(Request $request){
    	$products =Product::take(3)->get();
        $productsRecommen =Product::take(10)->get();
        $productsAll =Product::all();
        if(Session::has('nameUser')!=null){
            $query = DB::table('users')->select('*')->where('name','=',Session::get('nameUser'))->get();
            $user='';
            foreach ($query as $user) {
                $user =array('name'=>$user->name, 'password'=>$user->password,'type'=>$user->type,'email'=>$user->email,'phone'=>$user->phone,'address'=>$user->address);
            }
            if($user!='')
                $request->session()->put('user',$user);
        }
        $category =DB::table('productcategory')->distinct()->get();;
    	return view('shop.index',['products'=>$products,'category'=>$category,'productsRecommen'=>$productsRecommen,'productsAll'=>$productsAll]);
    }

    public function getSelectCate(Request $request,$id){

        $products = DB::table('products')
            ->join('productcategory', 'products.categoryid', '=', 'productcategory.id')
            ->select('products.*')
            ->where('type', '=', $id)
            ->get();

        if(Session::has('nameUser')!=null){
            $query = DB::table('users')->select('*')->where('name','=',Session::get('nameUser'))->get();
            $user='';
            foreach ($query as $user) {
                $user =array('name'=>$user->name, 'password'=>$user->password,'type'=>$user->type,'email'=>$user->email,'phone'=>$user->phone,'address'=>$user->address);
            }
            if($user!='')
                $request->session()->put('user',$user);
        }
        $category =DB::table('productcategory')->distinct()->get();;
        return view('shop.select',['products'=>$products,'category'=>$category]);
    }
    public function getSelectBrand(Request $request,$id){
        $products = DB::table('products')
            ->join('productcategory', 'products.categoryid', '=', 'productcategory.id')
            ->select('products.*')
            ->where('brand', '=', $id)
            ->get();
        
        if(Session::has('nameUser')!=null){
            $query = DB::table('users')->select('*')->where('name','=',Session::get('nameUser'))->get();
            $user='';
            foreach ($query as $user) {
                $user =array('name'=>$user->name, 'password'=>$user->password,'type'=>$user->type,'email'=>$user->email,'phone'=>$user->phone,'address'=>$user->address);
            }
            if($user!='')
                $request->session()->put('user',$user);
        }
        $category =DB::table('productcategory')->distinct()->get();;
        return view('shop.select',['products'=>$products,'category'=>$category]);
    }

    public function getAddToCart (Request $request, $id){
        if (Auth::check()){
        	$product =Product::find($id);
        	$oldCart= Session::has('cart')?Session::get('cart'):null;
        	$cart= new Card($oldCart);
        	$cart->add($product,$product->id);

        	$request->session()->put('cart',$cart);

        	return redirect()->route('product.index');
        }else{
            return redirect()->route('user.signin');
        }
    }
    public function getDeleteCart(Request $request ,$id){
       $cart=$request->session()->get('cart');
       foreach ($cart->items as $key => $value) {

            if($key== $id){
                 $cart->totalQty -=$cart->items[$key]['qty'];
                 $cart->totalPrice -=$cart->items[$key]['price'];
                unset($cart->items[$key]);
               

            }
       }
       $request->session()->put('cart',$cart);
       
         return redirect()->route('product.shoppingCart');

    }
    public function getCart (){
    
    	if(!Session::has('cart')){
    		return view('shop.shopping-cart');
    	}
    	$oldCart=Session::get('cart');
    	$cart =new Card($oldCart);
    	return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
     
    }

    public function getShop(){
        $products = DB::table('products')->paginate(9);

        return view('shop.shop',['products'=>$products]);
    }

     public function getCategory(){
        // $category =DB::table('productcategory')->select('*')->get();
        $category =DB::table('productcategory')->paginate(4);
        return view('shop.category',['category1'=>$category]);
    }

    public function postCategory(Request $request){
        $this->validate($request,[
                'category'=>'required|min:4',
                'description'=>'required',
                'brand'=>'required|min:1'
            ]);
        DB::table('productcategory')->insert([
                'type'=>$request->input('category'),
                'decription'=>$request->input('description'),
                'brand'=>$request->input('brand'),
            ]);
        return redirect()->route('product.category');
    }

    public function postDeleteCategory(Request $request){
        DB::table('productcategory')->where('id', '=', $request->input('value'))->delete();
         return redirect()->route('product.category');
    }
    public function getOrder (){
       $orders = DB::table('orders')
            ->leftJoin('orderdetail', 'orders.id', '=', 'orderdetail.order_id')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->leftJoin('products', 'orderdetail.product_id', '=', 'products.id')
            ->select('*')
            ->whereNotNull('product_id')
            ->get();
        return view('user.order',['order'=>$orders]);
     
    }
     public function postOrder (Request $request){
        DB::table('orders')->where('id', '=', $request->input('delete'))->delete();
         DB::table('orderdetail')->where('order_id', '=', $request->input('delete'))->delete();
         return redirect()->route('product.order');
     
    }

}
