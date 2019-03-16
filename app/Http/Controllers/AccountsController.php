<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
//        var_dump(Account::first());
        return Account::all();
    }

    public function show(Account $account)
    {
        return $account;
    }

    public function store(Request $request)
    {

//        var_dump($request->all());
        $account = Account::create($request->all());

        return response()->json($account, 201);
    }

    public function update(Request $request, Account $account)
    {
        $account->update($request->all());

        return response()->json($account, 200);
    }

    public function delete(Account $account)
    {
        $account->delete();

        return response()->json(null, 204);
    }
}