<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
	public function getSignup(){
		return view('user.signin');
	}
	public function postSignup(Request $request){
		$this->validate($request,[
				'name'=>'required',
				'password'=>'required'
			]);
		$user =new User([
				'name'=>$request->input('name'),
				'password'=>bcrypt($request->input('password')),
			]);
		$user->save();
		Auth::login($user);
		return redirect()->route('user.profile');
	}
	public function getSignin(){
		return view('user.signin');
	}
	public function postSignin(Request $request){
		$this->validate($request,[
				'name'=>'required',
				'password'=>'required'
			]);
		if(Auth::attempt(['name'=>$request->input('name'),'password'=>$request->input('password')]))
		{
			$request->session()->put('nameUser',$request->input('name'));
			return redirect()->route('product.index');
		}
		return redirect()->back();
	}
	public function getProfile(Request $request){
		 $query = DB::table('users')->select('*')->where('name','=',Auth::id())->get();
		 return view('user.profile',['user'=>$query]);
	}
	public function postProfile(Request $request){

		DB::table('users')
            ->where('id', Auth::id())
            ->update(['name'=>$request->input('name'),'email'=>$request->input('mail'),'phone'=>$request->input('phone'),'address'=>$request->input('address')]);

		return redirect()->back();
	}
	public function getLogout(){
		Auth::logout();	
		session()->forget('cart');
		session()->forget('nameUser');
		session()->forget('user');
		return redirect()->back();
	}
	public function getAdmin(){
		$query = DB::table('productcategory')->select('*')->get();
		$products =Product::all();
		return view('user.add',['category'=>$query,'products'=>$products]);
	}
	public function postAdmin(Request $request	){
		echo (' '.$request->get('value'));
		$imagePath ="images/product-details/nophoto.png";
		if (Input::hasFile('file')){

			$file =Input::file('file');
			$file->move('images/product-details',$file->getClientOriginalName());
			$imagePath="images/product-details/".$file->getClientOriginalName();
			echo "<img src='{{URL::to($imagePath) }}'alt='' height='42' width='102'/>";
		}

		$this->validate($request,[
				'name'=>'required|min:4',
				'description'=>'required',
				'price'=>'required|min:1'
			]);
		$user =new Product([
				'title'=>$request->input('name'),
				'description'=>$request->input('description'),
				'price'=>$request->input('price'),
				'imagePath'=>$imagePath, 
				'categoryid'=>$request->get('value')
			]);
		$user->save();
		return redirect()->back();

		}
	public function getDelete(){
		$products =Product::all();
    	return view('user.delete',['products'=>$products]);
	}
	public function postDelete(Request $request){
		DB::table('products')->where('id', '=',$request->input('delete'))->delete();
		return redirect()->back();


	}
	public function getTest(Request $request){
		$test =$request->session()->get('user');
		if($test['email'] ==null and $test['phone'] ==null){
			return redirect()->route('user.update');
		}else{
			$Cart=$request->session()->get('cart');
			DB::table('orders')->insert(
			    ['user_id' => Auth::id(), 'totalPrice' => $Cart->totalPrice]
			);
			$oldCart=$request->session()->get('cart');
			$order_id=DB::getPdo()->lastInsertId();
    		foreach($oldCart->items as $key =>$value){
    			DB::table('orderdetail')->insert(
			    	['order_id' => $order_id, 'product_id' => $key, 'qty'=>$oldCart->items[$key]['qty'], 'total'=>$oldCart->items[$key]['price']]
				);
    		}
			session()->forget('cart');
			return view('user.help');
		}
    	return view('user.delete',['products'=>$products]);
	}
}
