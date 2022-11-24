<input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">

<?php 


$request->flash();
return back();  


$request->flash();

if($request->filled('title')){
    dd($request->all());
} else{
    return back();       
}