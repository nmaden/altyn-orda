<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Url;
class UrlZamenaServiceProvider extends ServiceProvider
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

      
	  $this->app->bind('urlzamena', function(){
		 return new Url();
	  });
	  
	  
      
		
		
		
    }
}
