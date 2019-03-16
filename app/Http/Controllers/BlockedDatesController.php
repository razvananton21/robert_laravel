<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlockedDate;

class BlockedDatesController extends Controller
{
    public function index()
    {
//        var_dump(Account::first());
        return BlockedDate::all();
    }

    public function store(Request $request)
    {

//        var_dump($request->all());
        $bd = BlockedDate::create($request->all());

        return response()->json($bd, 201);
    }
}
