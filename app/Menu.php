<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
     protected $fillable = [
        'name', 'path','parent'
    ];
    
    
    public function delete(array $options = []) {
    	
    	// $this
    	self::where('parent',$this->id)->delete();
		
		
		return parent::delete($options);
	}
}
