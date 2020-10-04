<?php
namespace Modules\Admin\Traits;

use Illuminate\Http\Request;

trait MainListMethod  {
    public function index(Request $request) {
		
		
                  

		
       
        return view($this->view_path.'.index', [
            'title' => trans($this->title_path.''),
            'items' => $this->def_model::filter($request)->latest()->paginate(24)
        ]);
    }
}