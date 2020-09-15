<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use Modules\Entity\ModelParent;
use Modules\Admin\Http\Requests\UniverRequest;
use Illuminate\Support\Facades\Validator;

trait MainUpdateMethod  {
    public function update(Request $request, ModelParent $item) {
		


 
	
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
        
        return redirect()->route($this->route_path.'_update', $item->id.'?lang='.$request->lang)->with('success', trans('main.updated_model'));
    }
}