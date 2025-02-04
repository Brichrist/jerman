<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\TemaForum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = TemaForum::where('id', $id)->first();
        return view('be.forum_index', compact('id','data'));
    }
    public function getMessages($id)
    {
        $forums = Forum::with('linkUser')->where('id_tema_forum', $id)
            ->latest()
            ->take(25)  // Ambil 50 pesan terakhir atau sesuaikan
            ->get();
        return response()->json($forums);
    }
    public function stream($id)
    {
        return response()->stream(function () {
            while (true) {
                $forums = Forum::with('linkUser')->where('id_tema_forum', $id)
                    ->latest()
                    ->take(10)
                    ->get();
                echo "data: " . json_encode($forums) . "\n\n";
                ob_flush();
                flush();
                sleep(1);
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream'
        ]);
    }

    public function send(Request $request)
    {
        $forum = Forum::create([
            'id_user' => $request->user,
            'id_tema_forum' => $request->id_tema_forum,
            'description' => $request->message
        ]);
        return response()->json($forum);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
