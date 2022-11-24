<?php 
   public function index()
    {
        $data = ['name' => 'cookie', 'age' => 6];
        return view('main.page1', compact('data'));
    }

?>


<h1>page 1 view</h1>
{{$data['name']}}
{{$data['age']}}

@php(dd($data))