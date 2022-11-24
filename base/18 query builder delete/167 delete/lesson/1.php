<?php 


use Illuminate\Support\Facades\DB;

DB::table('blog')->where('id', 2)->delete();
DB::table('code')->truncate();
