<?php 

\App::setLocale('en');
echo \App::getLocale();

Lang::setLocale('en');
Lang::getLocale();

Lang::get('auth.register');
Lang::get('auth.login');