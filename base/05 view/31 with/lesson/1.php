<?php 


public function index()
{
    $data = ['name' => 'cookie'];
    return view('main.page1')->with($data);
}

public function index()
{
    return view('main.page1')->with(['name' => 'cookie']);
}

public function index()
{
    return view('main.page1')->with($data)->with($data2);
}
