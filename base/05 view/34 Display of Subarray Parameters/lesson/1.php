<?php 

public function index()
{
    $data = [
        'php' => [
            'title' => 'laravel',
            'coach' => 'cookie',
            'time' => '60+'
        ],
        'javascript' => [
            'title' => 'React',
            'coach' => 'apsi',
            'time' => '63'
        ],
    ];
    return view('main.page1', $data);
}

{{$php['title']}}
{{$javascript['title']}}	