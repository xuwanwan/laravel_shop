<?php

class BaseController extends Controller {
    
    public function __construct()
    {
    
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
        $model_product =new Product();
        $model_catagory =new Category();
        $all_catagory =$model_catagory->get_all_catagory();
        $catagory_count =count( $all_catagory);
        $top_pro=$model_product->get_top_seller(6);
        $cart_count =Cart::all()->count();

        View::share('all_catagory', $all_catagory);
        View::share('catagory_count', $catagory_count);
        View::share('top_pro', $top_pro);
        View::share('cart_count', $cart_count);
	}

}
