<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Editor;
use App\Http\Requests\EditorRequest;
use Sentinel;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editor = Editor::select(
                    'editor.*',
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                    'users.email as email',
                    'users.is_active as is_active'
                )
                ->leftjoin('users', 'editor.user_id', '=', 'users.id')
                ->get();
        return view('page.editor.index', compact('editor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editor = null;
        return view('page.editor.create', compact('editor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditorRequest $request)
    {

        $is_active = ($request->is_active) ? 1 : 0;
        $user = \Sentinel::registerAndActivate([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            /*'username'   => $request->username,*/
            'email'      => $request->email,
            'password'   => User::DEFAULT_PASSWORD,
            'is_active'  => $is_active
        ]);

        Sentinel::findRoleBySlug('editor')->users()->attach(Sentinel::findById($user->id));

        $editor = new Editor([
            'name'      => $request->first_name.' '.$request->last_name,
            'about'     => $request->about,
            'user_id'   => $user->id
        ]);
        $editor->save();

        return redirect()->route('editor.index')->withSuccess('Create editor successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editor = Editor::select(
                    'editor.*',
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                    'users.email as email',
                    'users.is_active as is_active'
                )
                ->leftjoin('users', 'editor.user_id', '=', 'users.id')
                ->where('editor.id',$id)
                ->first();
        return view('page.editor.edit', compact('editor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditorRequest $request, $id)
    {
        $is_active = ($request->is_active) ? 1 : 0;
        
        $editor = Editor::findOrFail($id)->update(
            [
                'name'      => $request->first_name.' '.$request->last_name,
                'about'     => $request->about
            ]);

        $editor = Editor::select('user_id')->where('id',$id)->first();

        $user = User::findOrFail($editor->user_id)->update(
            [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                /*'username'   => $request->username,*/
                'email'      => $request->email,
                'is_active'  => $is_active
            ]);
        
        return redirect()->route('editor.index')->withSuccess('Update editor successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editor = Editor::find($id);
        if($editor){
            User::findOrFail($editor->id)->delete();   
        }
        $editor = Editor::findOrFail($id)->delete();
        return redirect()->route('editor.index')
            ->withSuccess('Delete editor successfully');
    }
}
