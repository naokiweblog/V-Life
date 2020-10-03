<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Storage;


class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $groups = Group::with('user')->orderBy('updated_at', 'desc')->get();
        return view('group.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Group::$rules);

        // if ($file = $request->image) {
        //     $fileName = time() . $file->getClientOriginalName();
        //     $target_path = public_path('uploads/');
        //     $file->move($target_path, $fileName);
        // } else {
        //     $fileName = "";
        // }
        
        $group = new Group;
        $group->user_id = $request->user()->id;
        $group->name = $request->name;
        $group->day = $request->day;
        $group->pref_id = $request->pref_id;
        if ($file = $request->image) {
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
            $group->image = Storage::disk('s3')->url($path);
        }
        // $group->image = $fileName;
        $group->content = $request->content;
        $group->save();

        return redirect('group/'.$group->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $user = Auth::user();
        $group_id = $group->id;
        $comments = Comment::with('user')->where('Group_id', $group->id)->get();
        return view('group.show', compact('group','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit', ['group' => $group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, Group::$rules);

        // if ($file = $request->image) {
        //     $fileName = time() . $file->getClientOriginalName();
        //     $target_path = public_path('uploads/');
        //     $file->move($target_path, $fileName);
        //     $group->image = $fileName;
        // }
        $group->name = $request->name;
        $group->day = $request->day;
        $group->pref_id = $request->pref_id;
        if ($file = $request->image) {
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
            $group->image = Storage::disk('s3')->url($path);
        }
        $group->content = $request->content;
        $group->save();

        return redirect('group/'.$group->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect('/');
    }
}
