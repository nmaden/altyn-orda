<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;
use Modules\Entity\ModelParent;

trait MainDeleteMethod  {
    public function delete(Request $request, ModelParent $item) {
	
        $action = new $this->action_delete($item, $request);
        $action->run();
        
        return redirect()->route($this->route_path)->with('success', trans('main.deleted_model'));
    }
}