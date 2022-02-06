<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //

    function search()
    {
        return view('search');
    }

    function find(Request $request)
    {
        $request->validate([
            'search' => 'required|min:2'
        ]);

        $search_text = $request->input('search');
        $countries = DB::table('country')
            ->where('Name', 'LIKE', '%' . $search_text . '%')
            ->paginate(2);
        $countries->appends($request->all());

        return view('search', ['countries' => $countries]);

    }
}
