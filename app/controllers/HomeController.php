<?php
class HomeController extends BaseController {

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
	public function Index()
	{  
        $model_product =new Product();
        $model_catagory =new Category();
        $header_array =array(
            'title' =>'Home',
            'description' =>'Home',
            'keywords' =>'Home'
        );
 
        $new_pro=$model_product->get_new_product(6);
        /*
        $product =$model_catagory->find(119)->Product()->take(3)->get();
        
        $account = $model_product->find(1)->product_des()->where('language_id','1')->get();
        var_dump($account);exit;
        */
		return View::make('index')->with(compact('header_array','new_pro'));
	}

    public function Category($category_id){
        $category_info =Category::find($category_id);
        $category_desc =Category::find($category_id)->category_des()->where('language_id','1')->get();
        $category_info->name=$category_desc[0]->name;
        $products =Category::find($category_id)->Product()->paginate(24);
        foreach($products as $key=>$pro_item){
            $product_desc =Product::find($pro_item->id)->product_des()->where('language_id','1')->first();
            $pro_item->name =$product_desc->name;
            $products[$key] = $pro_item;
        }
        
        /*
        $model_product =new Product();
        $products =$model_product->get_category_product($category_id,24);
        */
        $header_array =array(
            'title' =>$category_info->name,
            'description' =>$category_info->name,
            'keywords' =>$category_info->name
        );
        return View::make('products')->with(compact('header_array','category_info','products'));
    }

    public function Product($product_id){
        $product_info =Product::find($product_id);
        $product_desc =$product_info->product_des()->where('language_id','1')->get();
        $product_info->name =$product_desc[0]->name;
        $product_info->description =$product_desc[0]->description;
        $header_array =array(
            'title' =>$product_info->name,
            'description' =>$product_info->name,
            'keywords' =>$product_info->name
        );
        return View::make('productdetail')->with(compact('header_array','product_info'));
    }

    

}
