<input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">

<?php 


        $request->flashExcept('title');
        return back();