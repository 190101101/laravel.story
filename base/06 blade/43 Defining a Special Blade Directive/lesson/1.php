<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider
{
	public function boot()
	{
	    \Blade::directive('br', function(){
	        return '<br>';
	    });

	    \Blade::directive('sayHello', function($name){
	        return "hello {$name}";
	    });

	    \Blade::directive('custom', function($arg){
	        return "<".$arg.">";
	    });
	}
}
