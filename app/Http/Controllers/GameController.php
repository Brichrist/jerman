<?php

namespace App\Http\Controllers;

use App\Models\Vocab;
use App\Models\Favorite;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index()
    {
        return view('game.index');
    }
    public function updateVocab(Request $request)
    {
        try {
            $vocabulary = Vocab::find($request->id);
            if ($vocabulary) {
                $vocabulary->german_word = $request->german_word;
                $vocabulary->meaning = $request->meaning;
                $vocabulary->save();
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false, 'message' => 'Word not found']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function vocabIndex()
    {
        return view('game.vocab.index');
    }

    public function vocabPlay(Request $request)
    {
        $data = $request->all();
        $kapital = $data['kapital'];
        $useFavorites = $data['use_favorites'];
        $language = $data['language'];

        if ($request->same == true) {
            $vocabularies = session('vocabularies', []);
            if (count($vocabularies) == 0) {
                $vocabularies = Vocab::when($kapital !== null, function ($query) use ($kapital) {
                    return $query->where('kapital', $kapital);
                })
                    ->when($useFavorites, function ($query) {
                        return $query->whereHas('linkFavorite');
                    })
                    ->when($kapital == '', function ($query) use($useFavorites) {
                        return $query->inRandomOrder()->when($useFavorites != null, function ($q) {
                            return $q->limit(100);
                        });
                    })
                    ->with('linkFavorite')
                    ->get();
            }
        } else {
            # code...
            $vocabularies = Vocab::when($kapital !== null, function ($query) use ($kapital) {
                return $query->where('kapital', $kapital);
            })
                ->when($useFavorites, function ($query) {
                    return $query->whereHas('linkFavorite');
                })
                ->when($kapital == '', function ($query) use($useFavorites) {
                    return $query->inRandomOrder()->when($useFavorites != null, function ($q) {
                        return $q->limit(100);
                    });
                })
                ->with('linkFavorite')
                ->get();
        }
        $vocabularies = $vocabularies->shuffle();
        session(['vocabularies' => $vocabularies]);

        // $vocab = Vocab::get();
        // dd($vocab, $language, $request->all());
        return view('game.vocab.play', compact('vocabularies', 'language'));
    }

    public function toggleFavorite(Request $request)
    {
        if (strpos($request->url(), 'vocab') !== false) {
            $model = 'vocab';
        } elseif (strpos($request->url(), 'redemittel') !== false) {
            $model = 'redemittel';
        } elseif (strpos($request->url(), 'gramatik') !== false) {
            $model = 'gramatik';
        }

        if ($model) {
            $favorite = Favorite::where('model', $model)
                ->where('id_model', $request->id)
                ->where('id_user', $request->id_user)
                ->first();

            if ($favorite) {
                $favorite->delete();
            } else {
                Favorite::create([
                    'model' => $model,
                    'id_user' => $request->id_user,
                    'id_model' => $request->id,
                ]);
            }
        }

        // Add your logic for toggling favorite vocab here
        return response()->json(['success' => true, 'action' => $favorite ? 'delete' : 'add']);
    }
}
