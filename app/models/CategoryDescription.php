<?php

class CategoryDescription extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category_description';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     public function category()
    {
        return $this->belongsTo('Category');
    }
    


}
