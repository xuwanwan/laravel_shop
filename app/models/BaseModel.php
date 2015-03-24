<?php

class BaseModel extends Eloquent
{
     public function scopeMultiwhere($query, $arr)
    {
        if (!is_array($arr)) {
            return $query;
        }
 
        foreach ($arr as $key => $value) {
            $query = $query->where($key, $value);
        }
        return $query;
    }
}
