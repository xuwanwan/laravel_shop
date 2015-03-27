<?php

class Order extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order';
    //public $timestamps = false;
    protected $primaryKey ='order_id';
    //public $timestamps =false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     
	public function OrderProduct(){
        return $this->hasMany('order_product','order_id');
     }
    


}