<?php 
  
    $data = $request->validate([
        'title' => 'bail|required|min:5|max:10',
        'content' => 'bail|required|min:5|max:10',
        'must' => 'required',
    ]);

    return $request->all();