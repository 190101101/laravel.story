<?php 
// https://laravel.com/docs/6.x/collections#main-content

Route::get('/code', function () {
    // $arr = collect([1,2,3,4,5,19]);
    $arr = collect([
        ['id' => 1, 'name' => 'cookie', 'age' => 6],
        ['id' => 2, 'name' => 'apsi', 'age' => 13],
        ['id' => 3, 'name' => 'ketty', 'age' => 7],
    ]);
    $plucked = $arr->pluck('name');
    return $plucked->all();
});


Route::get('/code', function () {
    $arr = collect([1,2,3,4,5,19, [1,2,34]]);
    $arr = collect([
        'name' => 'cookie',
        'age' => 6
    ]);
    return $arr->flatten();
    return $arr->get('name');
});

Route::get('/code', function () {
    $arr = collect([1,2,3,4,5]);
    $filtered = $arr->filter(function($val, $key){
        return $key > 3;
    });
    return $filtered->all();
});

Route::get('/code', function () {
    $arr = collect(['red', 'green', 'yellow', 'black']);
    return $arr->diff(['yellow']);
    return $arr->except(0, 2);
});

Route::get('/code', function () {
    $arr = collect([1,2,3,4,5]);
    return $arr->all();
    return $arr->avg();
    return $arr->count();
    return $arr->min();
    return $arr->max();
    return $arr->dd();
    return $arr->diff(40);
    return $arr->duplicates();
    return $arr->only(2);
    return $arr->first();
    return $arr->last();
    return $arr->forget(5);
    return $arr->forget(5)->all();
    return 'result: ' . $arr->isEmpty();
    return 'result: ' . $arr->isNotEmpty();
    $arr->pop();
    $arr->prepend(20);
    $arr->pull('name');
    return $arr->random();
    return $arr->search(6);
    $arr->shuffle();
    return $arr->sort()->values()->all();
    return $arr->sortBy('age');
    return $arr->sortByDesc('id')->values()->all();
    return $arr->sum();
    return $arr->unique()->values()->all();
});

