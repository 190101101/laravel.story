<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\User;
use App\Models\admin\Article;
use Illuminate\Support\Str;
use Validator;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = User::count();
        $data['user'] = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'login' => 'required|unique:user|alpha_dash|max:25|min:3',
            'password' => 'required|min:3|max:25',
        ])->validate();

        $user = User::where('login', $request->login)->get();

        if($user->count()){
            return back()->with('warning', 'by such a title the user exists');
        }

        return User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ])
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id) ?? abort(404);
        return view('admin.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id) ?? abort(404);
        return view('admin.user.update')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'password' => 'required|min:3|max:25',
            'type' => 'bail|required',
        ])->validate();

        $user = User::where('id', $id)->first() ?? abort(404);

        $user->password = bcrypt($request->password);
        $user->type = $request->type;
        return $user->save()
            ? back()->with('success', 'created successfully')
            : back()->with('error', 'something wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $user = User::where('id', $id)->where('type', '!=', 'admin')->first();

        if(!$user){
            echo false;
            exit;
        }

        $article = Article::where('user_id', $user->id)->get();

        if($article){
            Article::where('user_id', $user->id)->delete();
        }

        echo User::where('id', $user->id)->delete() ? true : false;
    }


    public function status($id)
    {
        $user = User::find($id);
        $data = $user == null ? false : $user;
        if(!$data) return false;
        $status = $data->status == 1 ? 0 : 1;
        $data->status = $status;
        echo $data->save() ? true : false;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        Validator::make($request->only(['query']), [
            'query' => 'bail|required|alpha_dash|min:3|max:20',
        ])->validate();

        $data['user'] = User::where('login', 'LIKE', "%{$query}%")
            ->orWhere('id', 'LIKE', "%{%query}%")->orderBy('id', 'DESC')->take(20)->get();

        if(!$data['user']->count()){
            return redirect()->route('user.index')
                ->with('error', 'nothing found by search');
        }

        return view('admin.user.search', compact('data'))->with('query', $query);
    }
}

