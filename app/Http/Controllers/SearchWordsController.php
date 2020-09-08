<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;

class SearchWordsController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('search');
        $words = Dictionary::with('terms.translations')->get();

        return view('search')->with(compact('words'));
    }

    public function search(Request $request)
    {

        $request->session()->flash('search', 'You are now searching for: ' . $request->input('s'));

        $words = Dictionary::with(['terms.translations' => function ($translation) use ($request) {
            $translation->where('translation', '=', $request->input('s'));
        }])->get();

        return view('search')->with(compact('words'));
    }
}
