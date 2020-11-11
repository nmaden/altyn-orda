<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 30.09.2019
 * Time: 23:15
 */

namespace App\Services\Page;


use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind("page", 'App\Services\Page\Page');
    }
}