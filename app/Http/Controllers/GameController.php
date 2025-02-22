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
        $useLimit = $data['use_limit'] ?? 'default';
        $germanWord = $data['german_word'] ?? null;
        $language = $data['language'];

        if ($request->same == true) {
            $vocabularies = session('vocabularies', []);
            if (count($vocabularies) == 0) {
                $vocabularies = Vocab::when($kapital !== null, function ($query) use ($kapital) {
                    return $query->where('kapital', 'like', '%' . $kapital . '%');
                })
                    ->when($useFavorites, function ($query) use ($useFavorites) {
                        return $query->whereHas('linkFavorite', function ($subQuery) use ($useFavorites) {
                            if ($useFavorites == 1) {
                                return $subQuery;
                            } else {
                                return $subQuery->where('level', 2);
                            }
                        });
                    })
                    ->when($kapital == '', function ($query) use ($useFavorites, $useLimit) {
                        return $query->inRandomOrder()->when(!$useFavorites || $useLimit == 'default', function ($q) {
                            return $q->limit(100);
                        });
                    })
                    ->when(auth()->user()->role !== 'owner', function ($query) {
                        return $query->where(function ($q) {
                            $q->whereNull('id_user')
                                ->orWhere('id_user', auth()->id());
                        });
                    })
                    ->with('linkFavorite')
                    ->get();
            } else {
                $vocabularies = $vocabularies->pluck('id')->toArray();
                $vocabularies = Vocab::whereIn('id', $vocabularies)->with('linkFavorite')->get();
            }
        } else {
            if ($germanWord) {
                $vocabularies = Vocab::where('german_word', 'like', '%' . $germanWord . '%')->when(auth()->user()->role !== 'owner', function ($query) {
                    return $query->where(function ($q) {
                        $q->whereNull('id_user')
                            ->orWhere('id_user', auth()->id());
                    });
                })->get();
            } else {
                $vocabularies = Vocab::when($kapital !== null, function ($query) use ($kapital) {
                    return $query->where('kapital', 'like', '%' . $kapital . '%');
                })
                    ->when($useFavorites, function ($query) use ($useFavorites) {
                        return $query->whereHas('linkFavorite', function ($subQuery) use ($useFavorites) {
                            if ($useFavorites == 1) {
                                return $subQuery;
                            } else {
                                return $subQuery->where('level', 2);
                            }
                        });
                    })
                    ->when($kapital == '', function ($query) use ($useFavorites, $useLimit) {
                        return $query->inRandomOrder()->when(!$useFavorites || $useLimit == 'default', function ($q) {
                            return $q->limit(100);
                        });
                    })
                    ->when(auth()->user()->role !== 'owner', function ($query) {
                        return $query->where(function ($q) {
                            $q->whereNull('id_user')
                                ->orWhere('id_user', auth()->id());
                        });
                    })
                    ->with('linkFavorite')
                    ->get();
            }
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
                    'level' => $request->level ?? 1,
                    'id_model' => $request->id,
                ]);
            }
        }

        // Add your logic for toggling favorite vocab here
        return response()->json(['success' => true, 'level' => ($request->level ?? 1), 'action' => $favorite ? 'delete' : 'add']);
    }
}
