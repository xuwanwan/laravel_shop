<?php

class Category extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';
    protected $primaryKey = 'category_id';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     public function get_all_catagory(){
         $return_data =array();
         $data =$this
             ->join('category_description', 'category_description.category_id', '=', 'Category.category_id')
             ->select('category.*', 'category_description.name')
            ->Multiwhere(array('category.level'=>'1','category.status'=>'1','category.top'=>'1','category_description.language_id'=>'1'))->orderBy('category.sort_order', 'ASC')->get();
         foreach($data as $item){
            if($child=$this->get_child_catagory($item->category_id)){
                $item['child'] =$child;
            }
            $return_data[] =$item;
         }
          return $return_data;
     }

     public function get_child_catagory($category_id){
        $child =$this
            ->join('category_description', 'category_description.category_id', '=', 'Category.category_id')
            ->select('category.*', 'category_description.name')
            ->where('status','1')->where('category_description.language_id','1')->where('category.parent_id',$category_id)->orderBy('category.sort_order', 'ASC')->get();
        return $child;
     }
    


     public function category_des()
    {
        return $this->hasMany('CategoryDescription','category_id');
    }
    /*
    * 分类对应的商品，多对多关系   
    *  product
    *  category
    *  product_to_category
    *
    */
     public function Product(){
        return $this->belongsToMany('product','product_to_category','category_id','product_id');
     }

}