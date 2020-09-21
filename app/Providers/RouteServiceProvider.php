<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

		  Route::model('calendar', \Modules\Entity\Model\Calendar\Calendar::class);
		  
		  Route::model('city', \Modules\Entity\Model\LibCity\LibCity::class);
		  
		  Route::model('language', \Modules\Entity\Model\LibLanguage\LibLanguage::class);

		  Route::model('gid', \Modules\Entity\Model\Gid\Gid::class);
		  
		  Route::model('routes', \Modules\Entity\Model\Routes\Routes::class);
		  
		  Route::model('sights', \Modules\Entity\Model\Sights\Sights::class);
		  Route::model('home', \Modules\Entity\Model\Home\Home::class);
		  Route::model('slider', \Modules\Entity\Model\Slider\Slider::class);
		  Route::model('about', \Modules\Entity\Model\About\About::class);
		  Route::model('tabs', \Modules\Entity\Model\Tabs\Tabs::class);
		  Route::model('coords', \Modules\Entity\Model\Coords\Coords::class);
		  Route::model('figure', \Modules\Entity\Model\Figure\Figure::class);
		  Route::model('menu', \Modules\Entity\Model\Menu\Menu::class);


    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
