<?php

class Product extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     public function get_top_seller($num=5){
         $data =$this
             ->join('product_description','product.id','=','product_description.product_id')
             ->select("product.id",'product.price','product.image','product_description.name')
             ->where('stock_status_id','5')
             ->where('status','1')
             ->where('product_description.language_id','1')
             ->orderBy('id', 'ASC')
             ->take($num)
             ->get();
          return $data;
     }

     public function get_new_product($num){
        $data =$this
          ->join('product_description','product.id','=','product_description.product_id')
         ->select('product.id','product.price','product.image','product_description.name')
         ->where('stock_status_id','5')
         ->where('status','1')
         ->where('product_description.language_id','1')
         ->orderBy('id', 'ASC')
         ->take($num)
         ->get();
        return $data;
     }
    
     public function get_category_product($category_id,$prg_num){
        $data =$this
           ->join('product_description','product.id','=','product_description.product_id')
           ->join('product_to_category','product.id','=','product_to_category.product_id')
           ->select('product.id','product.price','product.image','product_description.name')
           ->Multiwhere(array('stock_status_id'=>'5','status'=>'1','product_description.language_id'=>'1'))
           ->orderBy('id', 'ASC')
           ->paginate($prg_num);
         return $data;

     }
     public function product_des()
    {
        return $this->hasMany('ProductDescription','product_id');
    }
    
    public function category()
    {
        return $this->belongsToMany('Category','product_to_category','product_id','category_id');
    }

    


}
