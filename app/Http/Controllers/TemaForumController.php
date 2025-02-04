<?php

namespace App\Http\Controllers;

use App\Models\TemaForum;
use Illuminate\Http\Request;

class TemaForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = TemaForum::when(request('title'), function ($query) {
            $query->where('title', "like", "%" . request('title') . "%");
        })->when(request('status'), function ($query) {
            if (request('status') != 'all') {
                $query->where('status', request('status'));
            }
        })->orderBy('important', 'asc')->orderBy('created_at', 'desc')->with(['linkUser'])->withcount('linkForum')->paginate(10);
        return view('be.temaforum_index', compact('themes'));
    }

    public function create()
    {
        return view('be.temaforum_create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'in:active,inactive,closed'],
            'important' => ['nullable', 'in:1,0'],
            'locked' => ['nullable', 'in:yes,no'],
        ];

        $request->validate($rules);

        $data = $request->only(['title', 'description', 'status', 'important', 'locked']);

        if ($request->id ?? null) {
            // dd('a');
            TemaForum::where('id', $request->id)->update($data);
        } else {
            // if (auth()->user()->role == 'user') {
            // }
            $data['id_user'] = auth()->user()->id;
            TemaForum::create($data);
        }

        $request->session()->flash('notif', ["success" => 'Data Saved']);
        return redirect('/forum');
    }

    public function show(TemaForum $temaForum) {}

    public function edit(TemaForum $temaForum) {}

    public function update(Request $request, TemaForum $temaForum) {}

    public function destroy(Request $request, $id)
    {
        TemaForum::where('id', $id)->update(['status' => 'inactive']);
        $request->session()->flash('notif', ["success" => 'Data Deleted']);

        return redirect('/forum');
    }
}
