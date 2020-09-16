<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use App\Services\UploadPhoto;
use Storage;
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
	
	
public function uploads(Request $request){
//$request->session()->forget('editor');
//$request->session()->save();
 //$request->session()->push('editor.'.$request->session()->getId(),55);

//Cache::put('menu2',$arr);	
	//dd($request->session()->get('editor'));
	//echo $request->session()->getId();exit();
$file = $request->file('upload');
$file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
$papka_save = 'editor';
$url = '/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;
$request->session()->put('editor');
$file_path = $file->storeAs('/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);


echo json_encode(array('uploaded'=>1,
	   'fileName'=>$file_name ,"url" => $url));
        
 
 
 
 

/*
$file = $request->file('upload');
$extension = $request->file('upload')->getClientOriginalExtension();
		$mime = $request->file('upload')->getMimeType();
		$name =  $this->getFileName() . ".".$extension;
		$url='/uploads/'.$name;
		$path = public_path().'/uploads/'.$name;
		   $destinationPath = $path;
        $img = ImageInt::make($file->getRealPath());
		 $img->resize(500, 500, function ($constraint) {
        $constraint->aspectRatio();})->save($destinationPath);
		$name_img = $name;
		//dd($name);
       echo json_encode(array('uploaded'=>1,
	   'fileName'=>$name,"url" => $url));
	*/
	
	
	
}

	//функция создания уникального название для картинки
	function getFileName(){
     $char = ['a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K',
                   'l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V',
                   'w','W','x','X','y','Y','z','Z'];
     $rename = array_rand($char, 7);
	 $str = "";
	 foreach($rename as $k => $v){
	 	$str .= $k . "" . $v;
	 }
	 $hash = hash("sha256", $str);
	 $hash = substr($hash, 5,10);
	 $uniq = md5(uniqid(rand(),1));
	 $uniq = substr($uniq, 0,4);
	 $newname = $hash  . $uniq;

     return $newname;
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
