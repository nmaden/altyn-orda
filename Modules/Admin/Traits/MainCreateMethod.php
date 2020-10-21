<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;

use Modules\Admin\Http\Requests\MainRequest;
use Session;
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
		
		   $validator = $this->validator($request->all());
        if ($validator->fails()) { 
        return redirect()->back()->withErrors($validator)->withInput();
        };
	
		
	//dd($request->all());
	/*
  	$validator = $this->validator($request->all());
    if($validator->fails()) {
	  Session::put('old',$request->all());
	  Session()->save();
	  return redirect()->back()->withErrors($validator)->withInput($request->all());
     }
	*/
	$model = new $this->def_model();
	//dd($request->all());
	$action = new $this->action_create(new $this->def_model(), $request);

        try {
            $action->run();
        } catch (\Exception $e) {
			
            return redirect()->back()->with('error', $e->getMessage());
        }

       Session::forget('old');

        return redirect()->route($this->route_path)->with('success', trans('main.created_model'));
    }
	

	
	
	
   

}