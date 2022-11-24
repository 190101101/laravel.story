<?php 


echo Auth::id();

$user = Auth::User();
return view('home', $user);