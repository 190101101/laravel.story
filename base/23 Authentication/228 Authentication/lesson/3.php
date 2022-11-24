<?php 

public function authenticate(Request $request)
{
    $data = $request->only('email', 'password');

    if(Auth::attempt($data)){
        return redirect()->intended('home');
    }
    else{
        echo 'no have';
    }
}

public function logout()
{
    Auth::logout();
    return redirect('mlogin');
}


if(Auth::attempt([
    'email' => $request->email, 
    'password' => $request->password,
    // 'id' => 2
])){
    return redirect()->intended('home');
}else{
    return 'oops';
}