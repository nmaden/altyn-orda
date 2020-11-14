<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;

use Modules\Admin\Http\Requests\MainRequest;
use Session;
use Illuminate\Support\Facades\Validator;

trait MainCreateMethod  {
    public function create(Request $request) {
		
	 
	
	return view($this->view_path.'.create', [
	       
            'title' => trans($this->title_path.'_create'),
            'ar_bread' => [
                route($this->route_path) => trans($this->title_path.'')
            ]
        ]);
    }

    public function saveCreate(Request $request) {
		
		try{
			$validator = $this->validator($request->all());
			if ($validator->fails()) { 
		     return redirect()->back()->withErrors($validator)->withInput();
            };
		
		}
		 catch (\Exception $e) {
		return redirect()->back()->with('error', $e->getMessage());

		}

	//dd($request->all());
	$action = new $this->action_create(new $this->def_model(), $request);

        try {
            $action->run();
        } catch (\Exception $e) {
			
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route($this->route_path)->with('success', trans('main.created_model'));


        
    }
	

	
	
	
   

}