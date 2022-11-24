<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\contact;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = contact::count();
        $data['contact'] = contact::orderBy('id', 'desc')->paginate(10);
        return view('admin.contact.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = contact::find($id) ?? abort(404);
        return view('admin.contact.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = contact::find($id);
        $data = $contact == null ? false : $contact;
        echo $data->delete() ? true : false;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        Validator::make($request->only(['query']), [
            'query' => 'bail|required|alpha_dash|min:3|max:20',
        ])->validate();

        $data['contact'] = contact::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{%query}%")->orderBy('id', 'DESC')->take(20)->get();

        if(!$data['contact']->count()){
            return redirect()->route('contact.index')
                ->with('error', 'nothing found by search');
        }

        return view('admin.contact.search', compact('data'))->with('query', $query);
    }
}

