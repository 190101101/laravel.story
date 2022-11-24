<h1>code view</h1>

@php

echo 'hello';

$data = "<script>alert('123');</script>";
@endphp

{!!$data!!}

@php(dd('123'))

