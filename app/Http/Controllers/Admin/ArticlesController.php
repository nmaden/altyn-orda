<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Corp\Http\Requests\ArticleRequest;

use App\Http\Requests;
//use App\Http\Controllers\Controller;

use App\Repositories\ArticlesRepository;

//use Gate;

use App\Article;
use App\User;

use Event;
use Auth;

//use App\Events\onAddArticleEvent;

class ArticlesController extends AdminController
{
    
     public function __construct(ArticlesRepository $a_rep) {
	 $this->a_rep = $a_rep;
	 $this->template = 'index';
	}
    
    
    public function index()
    {
		
		$this->title = 'Блог';
		$this->keywords = 'String';
		$this->meta_desc = 'String';

		$articles = $this->getArticles();
		$content = view('admin.articles.show')->with(['articles'=>$articles])->render();
		

		$this->vars['content']= $content;
		return $this->renderOutput(); 
			
			 

	}
	 public function articlesadd(Article $article){
		 		

		 $content = view('admin.articles.add')->with(['module'=>$article])->render();
		 $this->vars['content']= $content;
		 return $this->renderOutput(); 
	 
     }
        
        
   
    
    
     public function getArticles()
    {
        //
        
        return $this->a_rep->get();
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		echo 'create';exit();
		if(Gate::denies('save', new \Corp\Article)) {
			abort(403);
		}
		
		$this->title = "Добавить новый материал";
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}
		
		$this->content = view(config('settings.theme').'.admin.articles_create_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Article $article)
    {
	   
      	
		$result = $this->a_rep->addArticle($request);
		
		return redirect('/home')->with($result);
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
    public function edit(Article $article)
    {
			  

		  $content = view('admin.articles.edit')->with(['module'=>$article])->render();
	      $this->vars['content']= $content;
		
		return $this->renderOutput();
        //
        //$article = Article::where('alias', $alias);
        /*
        if(Gate::denies('edit', new Article)) {
			abort(403);
		}
		
		$article->img = json_decode($article->img);
		
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}
		
		$this->title = 'Реадактирование материала - '. $article->title;
		*/
	
		
		
    }

       public function update(Request $request,Article $article)
    {
       if (Auth::guest()){
		   echo 500;exit();
	   }
	  
		    $result = $this->a_rep->update($request,$article);
		    //if(Gate::allows('update',$article))
			$article->title = $request->title;
	    	//$article->img = request->img;
	    	$article->text = $request->text;
	    	$user = Auth::user();
            $res = $user->articles()->save($article);
	        return redirect()->back()->with('message','Материал обновлен');
		
         }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //   articles -> Article  


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        
        $result = $this->a_rep->deleteArticle($article);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/home')->with($result);
        
        
    }
}
