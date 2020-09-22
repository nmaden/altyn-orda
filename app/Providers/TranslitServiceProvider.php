<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Translit;
class TranslitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

      
	  $this->app->bind('translit', function(){
		 return new Translit();
	  });
	  
	  
      
		
		
		
    }
}
