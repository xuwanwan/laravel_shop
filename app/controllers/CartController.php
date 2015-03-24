<?php
class CartController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function addCart($product_id){
        $product_info =Product::find($product_id);
        $cart =new Cart();
        if($cart_info =Cart::where('product_id',$product_id)->first()){
            $cart =Cart::find($cart_info->rec_id);
            $cart->goods_number =2;
            $cart->save();
        }else{
            $cart_info =array();
            $cart->product_id =$product_id;
            $cart->model=$product_info->model;
            $cart->goods_number =1;
            $cart->remote_ip =$_SERVER['REMOTE_ADDR'];
            $save =$cart->save();
        }
        return Redirect::to('cart')->with('success', '添加成功');

    }

    public function showCart(){
       $cart_info =Cart::all();
       $cart_data =array();
       $cart_total =0;
       foreach($cart_info as $cart_pro){
            $product_info =Product::find($cart_pro['product_id']);
            $product_desc =$product_info->product_des()->where('language_id','1')->first();
            $cart_pro->name =$product_desc->name;
            $cart_pro->price =$product_info->price;
            $cart_data[] =$cart_pro;
            $cart_total +=$product_info->price*$cart_pro->goods_number;
       }
       $header_array =array(
            'title' =>'购物车详情',
            'description' =>'购物车详情',
            'keywords' =>'购物车详情'
        );
       return View::make('shoppingcart')->with(compact('header_array','cart_data','cart_total'));
    }

    public function update(){
        $input =Input::get();
        $goods_number =$input['goods_number'];
        $key_info =$input['key'];
        foreach($goods_number as $key=>$num){
            $rec_id =intval($key_info[$key]);
            $cart =Cart::find($rec_id);
            $cart->goods_number =intval($num);
            $cart->save();
        }
        return Redirect::to('cart')->with('success', '更新成功');
    }

    public function remove($key){
        $key =intval($key);
        if($key){
            Cart::destroy($key);
            return Redirect::to('cart')->with('success', '删除成功');

        }else{
            return Redirect::to('cart')->with('success', '错误请求');
        }
    }

}
