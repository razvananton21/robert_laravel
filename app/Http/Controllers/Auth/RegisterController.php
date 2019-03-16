<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'legitimation_number' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {

        var_dump($data);
        return Account::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'legitimation_number' => $data['legitimation_number'],
            'user_type' => $data['user_type']
        ]);
    }

    protected function registered(Request $request, Account $account)
    {
        $account->generateToken();

        return response()->json(['data' => $account->toArray()], 201);
    }
}
