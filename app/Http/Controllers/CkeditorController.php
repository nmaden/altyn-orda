<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use App\Services\UploadPhoto;
use Storage;
use Modules\Entity\Model\Tabs\Tabs;
class CkeditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
        return view('orda.efinder.main');
    }
	  public function index2(Request $request)
    {
		  $text = "Дом двор арбуз дом двор двор";


     
$array1[0]='<img alt="" src="/store/test/2020/09/13/160001.jpg"';
$array1[1]=	'<img alt="" src="/store/test/2020/09/13/16000189409.jpg" style="height:122px; width:122px" />';


		
        preg_match_all('/<img[^>]+>/i',$request->editor1,$array2); //разбиваем текст на слова
		
		 
		$intercest = array_intersect($array1, $array2[0]);
		$diff = array_diff($array1, $array2[0]);
		$merge = array_merge($diff,$intercest);
		$diff2 = array_intersect($array2[0], $merge);
		
		
		//dd($array2[0]);
		 preg_match_all('/(alt|title|src)=("[^"]*")/i',$img_tag, $img[$img_tag]);
        return view('orda.efinder.main');
    }
	
	
public function uploads99999(Request $request){
$file = $request->file('upload');
$file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
$papka_save = 'editor';
$url = '/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;

	$uri = url()->previous();
	$find = strpos($uri,'update');
	if(isset($find)){
		
		preg_match('/update\/[\d]+/i',$uri,$arr);
		if(isset($arr[0])){
			$explod= explode('/',$arr[0]);
			if(isset($explod[1])){
				if(is_numeric($explod[1])){
					$id = $explod[1];
					$tabs = Tabs::where('id',$id)->first();
					if(isset($tabs->photo) && $tabs->photo !=''){
						if(@unserialize($tabs->photo)){
						$photo = unserialize($tabs->photo);
						}
					}else{$photo = [];}
					 array_push($photo,$url);
					 $tabs->photo = serialize($photo);
		             $tabs->save();
					 $file_path = $file->storeAs('/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
				}
		       }
	          }
	         }
	    echo json_encode(array('uploaded'=>1,
	   'fileName'=>$file_name ,"url" => $url));
        
}

	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
