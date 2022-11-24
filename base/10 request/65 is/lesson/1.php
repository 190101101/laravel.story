<form action="{{route('create')}}" method="POST">
<?php 

Route::post('create', 'CodeController@create')->name('create');
if($request->is('create'))

	
Route::post('admin/create', 'CodeController@create')->name('create');

if($request->is('admin/*'))
