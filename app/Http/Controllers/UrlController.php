<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{

    public function index()
    {

        $urls = Url::paginate(10)->toJson();

        return response()->json([
            'urls' => $urls
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $code)
    {
        $url = DB::table('urls')->where('code', $code)->first();

        if($url){

            return redirect()->away($url->url);

        }else{

            abort(404);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Url $url)
    {

        $url = $url->short_url($request->long_url);

        return response()->json([
            'short_url' => url('/') . '/' . $url
        ]);

    }

}
