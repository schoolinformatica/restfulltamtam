<?php

namespace App\Http\Controllers;

use App\Invite;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class InviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);  // or use 'only' in place of except
    }

    public function getInvite($id) {
        return Invite::find($id);
    }
    
    public function getAllInvites() {
        return Invite::all();
    }
    
    public function createInvite() {
        $invite = new Invite();
        
        $invite->time = Input::get('time');
        $invite->location = Input::get('location');
        $invite->usersInvited = Input::get('usersInvited');

        if ($invite->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function updateInvite($id) {
        $invite = Invite::find($id);

        if(Input::has('time'))
            $invite->time = Input::get('time');
        if(Input::has('location'))
            $invite->location = Input::get('location');
        if(Input::has('usersAccepted'))
            $invite->usersAccepted = Input::get('usersAccepted');
        if(Input::has('usersInvited'))
            $invite->usersInvited = Input::get('usersInvited');

        if ($invite->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function deleteInvite($id) {
        $invite = Invite::find($id);

        if ($invite->delete())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }
}
