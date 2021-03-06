<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use Modules\Entity\ModelParent;
use Modules\Admin\Http\Requests\UniverRequest;
use Illuminate\Support\Facades\Validator;
use PageService;

trait MainUpdateMethod  {
    public function update(Request $request, ModelParent $item) {
		
		
	if($request->lang == 'ru' || !isset($request->lang)){
            \App::setLocale('ru');
          }

	
        $title = trans($this->title_path.'_update');
		//echo trans($this->title_path.'');exit(); 
	
        return view($this->view_path.'.update', [
            'title' => $title,
            'ar_bread' => [
                route($this->route_path) => trans($this->title_path.''),
                route($this->route_path.'_show', $item) => trans($this->title_path.'_show'),
            ],
            'model' => $item
        ]);
    }

    public function saveUpdate(Request $request, ModelParent $item) {

		
		

		try{
			$validator = $this->validator($request->all(),$item);
			if ($validator->fails()) { 
		     return redirect()->back()->withErrors($validator)->withInput();
            };
		
		}
		 catch (\Exception $e) {
		return redirect()->back()->with('error', $e->getMessage());

		}

	   

	

   
     if ($request->lang && $request->lang != 'ru'){
	
            $model = $item->relTrans()->firstOrCreate(['lang'=>$request->lang]);
        }
        else {
            $model = $item;
		}
    
        $action = new $this->action_update($model, $request);
        
        try {
            $action->run();
        } catch (\Exception $e) {
			
            return redirect()->back()->with('error', $e->getMessage());
        }
		
		
		if($this->route_path == 'admin_content_manager'){
			 return redirect()->route($this->route_path)->with('success', trans('main.updated_model'));
		}

        if($request->lang){

        return redirect()->route($this->route_path.'_update', $item->id.'?lang='.$request->lang)->with('success', trans('main.updated_model'));
		
		}else{
			
		  return redirect()->route($this->route_path.'_update', $item)->with('success', trans('main.updated_model'));
		}
    }
}