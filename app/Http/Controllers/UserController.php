<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);  // or use 'only' in place of except
    }

    public function getUser($id)
    {
        return User::find($id);

    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(Request $request)
    {
        $user = new User();
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->dateOfBirth = Input::get('dateOfBirth');
        $user->gamertag = Input::get('gamertag');
        $user->description = Input::get('description');

        if ($user->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);

    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user->delete())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        if (Input::has("firstname"))
            $user->firstname = Input::get('firstname');
        if (Input::has("lastname"))
            $user->lastname = Input::get('lastname');
        if (Input::has("email"))
            $user->email = Input::get('email');
        if (Input::has("password"))
            $user->password = Input::get('password');
        if (Input::has("dateOfBirth"))
            $user->dateOfBirth = Input::get('dateOfBirth');
        if (Input::has("gamertag"))
            $user->gamertag = Input::get('gamertag');
        if (Input::has("description"))
            $user->description = Input::get('description');

        if ($user->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }
}

