<?php

class ProductDescription extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_description';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     public function product()
    {
        return $this->belongsTo('Product');
    }


    


}
