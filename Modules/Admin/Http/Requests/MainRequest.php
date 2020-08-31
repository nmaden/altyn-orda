<?php
namespace Modules\Admin\Http\Requests;

use Modules\Admin\Http\Requests\Requests;
use Illuminate\Validation\Rule;

class MainRequest extends Request
{
  
  public $model;
 public $flag = false;
  public $mm;
 
    public function authorize()
    {
		
	    return true;
    }
    
     protected function getValidatorInstance()
     {
		 
		
		$validator = parent::getValidatorInstance();
	
	
	    
		if($this->ajax == 'ajax'){
			echo json_encode(['content'=>$validator->errors()]);exit();
			 
			}else{
				return $validator;
			 //return redirect()->route($this->route_path)->withErrors($validator)->withInput();
		 }
		
	
		            return back()->withErrors($validator)->withInput();
		return $validator;
    	
    	
    
	 }
     public function rules()
    {
		
		return [
		 
       //'rank_unikum' => [Rule::unique('university')->ignore(800)],
		'headers_title' => 'sometimes|required|string',
   		'name' => 'sometimes|required|string',
        'vosrast' => 'sometimes|nullable|numeric',
	    'opyt' => 'sometimes|nullable|numeric',
	    'imya' => 'sometimes|string',
	    'price' => 'sometimes|nullable|numeric',
      ];
    }

}
