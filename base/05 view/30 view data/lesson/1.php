<?php
public function index()
{
    return view('main.page1', [
        'data' => [
            'name' => 'cookie',
            'age' => 6
        ]
    ]);
}

public function index2()
{
    $data = [
        'name' => 'cookie',
        'age' => 6
    ];
    
    return view('main.page2', $data);
}

Route::group(['namespace' => 'main'], function() {
    Route::get('page1', 'Page1Controller@index');
    Route::get('page2', 'Page1Controller@index2');
});

{{$data['name']}}
{{$data['age']}}

{{$name}}
{{$age}}
