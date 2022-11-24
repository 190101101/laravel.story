<?php 


if($request->has('image'))
{
    return $request->file('image');
}else{
    return back();
}