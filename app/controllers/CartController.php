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
       $cart_info =$this->getCartInfo();
       $cart_data =$cart_info['cart_data'];
       $cart_total =$cart_info['cart_total'];
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
    public function checkout(){
        $cart_info =$this->getCartInfo();
       $cart_data =$cart_info['cart_data'];
       $cart_total =$cart_info['cart_total'];
        $header_array =array(
            'title' =>'购物车结算',
            'description' =>'购物车结算',
            'keywords' =>'购物车结算'
        ); 
        return View::make('checkout')->with(compact('header_array','cart_data','cart_total')); 
    }

    public function confim(){

        $data =Input::all();
        $product_info =$this->getCartInfo();
        //插入订单数据
        $order =new Order();
        $order->firstname =$data['firstname'];
        $order->lastname =$data['lastname'];
        $order->shipping_address_1 =$data['address'];
        $order->shipping_city =$data['city'];
        $order->shipping_country =$data['country'];
        $order->email =$data['email'];
        $order->telephone =$data['phone'];
        $order->payment_code =$data['payment_code'];
        $order->total =$product_info['cart_total'];
        $order->currency_code ='USD';
        $order->order_number =time();
        $order_info =$order->toArray();
        $order_id =Order::insertGetId($order_info);
        //插入商品数据
        $order_product =new OrderProduct();
        foreach($product_info['cart_data'] as $pro){
            $order_product->order_id =$order_id;
            $order_product->product_id =$pro->product_id;
            $order_product->model =$pro->model;
            $order_product->name =$pro->name;
            $order_product->quantity =$pro->goods_number;
            $order_product->price =$pro->price;
            $order_product->total =($pro->price)*($pro->goods_number);
            $order_product->save();
        }
        return Redirect::to('payment/'.$data['payment_code']);
    }

    protected function getCartInfo(){
        $data =array();
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
       $data['cart_data'] =$cart_data;
       $data['cart_total'] =$cart_total;
       return $data;

    }

}
