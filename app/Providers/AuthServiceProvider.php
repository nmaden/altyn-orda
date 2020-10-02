<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\Entity\Model\Calendar\Calendar;
use Modules\Entity\Model\Sights\Sights;
use Modules\Entity\Model\Home\Home;
use Modules\Entity\Model\Slider\Slider;
use Modules\Entity\Model\About\About;
use Modules\Entity\Model\Tabs\Tabs;
use Modules\Entity\Model\Figure\Figure;
use Modules\Entity\Model\Social\Social;
use Modules\Entity\Model\Menu\Menu;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibLanguage\LibLanguage;
use Modules\Entity\Model\Cat\LibCat;


use Modules\Entity\Policies\ContentPolicy;
use Modules\Entity\Policies\MainPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
		Calendar::class => ContentPolicy::class,
		Sights::class => ContentPolicy::class,
		Home::class => ContentPolicy::class,
		Slider::class => ContentPolicy::class,
		About::class => ContentPolicy::class,
		Tabs::class => ContentPolicy::class,
		Figure::class => ContentPolicy::class,
		Social::class => ContentPolicy::class,
		Menu::class => ContentPolicy::class,
		
		LibCity::class => MainPolicy::class,
		LibLanguage::class => MainPolicy::class,
		LibCat::class => MainPolicy::class,



    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
