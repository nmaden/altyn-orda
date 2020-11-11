<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'uploads2',
		'figureseditor',
		'aboutseditor',
		'drobsone-send-routes',
		'drobsone-send2',
		'drobsone-remove',
		'slider-remove-routes',
        'drobsone-send-gid',
        'slider-remove-gid',
		'drobsone-send-about',
		'slider-remove-about'
		
    ];
}
