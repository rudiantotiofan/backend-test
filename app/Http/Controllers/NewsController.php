<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use App\Models\News;
use App\Models\User;
use App\Models\Editor;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $news = News::all();
        return view('page.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = null;
        return view('page.news.create', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $active = ($request->active) ? 1 : 0;

        $editor_id = 0;
        $editor_name = 'unknown';
        $user = User::find(user_info()->id);
        if($user){
            //check user is admin or not (admin id = 1)
            if($user->id==1){
                $editor_name = 'Administrator';
            }else{
                $editor = Editor::where('user_id', $user->id)->first();
                if($editor){
                    $editor_name = $editor->name;
                }
            }
        }

        $news = new News([
            'title'        => $request->title,
            'description'  => $request->description,
            'active'       => $active,
            'editor_id'    => $editor_id,
            'editor_name'  => $editor_name
        ]);
        $news->save();

        return redirect()->route('news.index')->withSuccess('Create news successfully');
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
        $news = News::find($id);
        return view('page.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $active = ($request->active) ? 1 : 0;
        $edited_by_admin = (user_info()->id==1) ? 1 : 0;
        
        $news = News::findOrFail($id)->update(
            [
                'title'            => $request->title,
                'description'      => $request->description,
                'active'           => $active,
                'edited_by_admin'  => $edited_by_admin
            ]);
        
        return redirect()->route('news.index')->withSuccess('Update News successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id)->delete();
        return redirect()->route('news.index')
            ->withSuccess('Delete news successfully');
    }
}
