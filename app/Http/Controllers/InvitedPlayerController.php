<?php

namespace App\Http\Controllers;

use App\InvitedPlayer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class InvitedPlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);  // or use 'only' in place of except
    }
    
    public function getInvitedPlayer($id) {
        return InvitedPlayer::find($id);
    }

    public function getInvitedPlayerByUserId($userid) {
        return InvitedPlayer::where('userId', $userid)->get();
    }

    public function getAllInvitedPlayers() {
        return InvitedPlayer::all();
    }

    public function createInvitedPlayer() {
        $invitedplayer = new InvitedPlayer();

        $invitedplayer->inviteId = Input::get('inviteId');
        $invitedplayer->userId = Input::get('userId');

        if ($invitedplayer->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function updateInvitedPlayer($inviteid, $userId) {
        $invitedplayer = InvitedPlayer::where('inviteId', $inviteid)->where('userId', $userId)->first();

        if(Input::has('accepted'))
            $invitedplayer->accepted = Input::get('accepted');
        if(Input::has('rejected'))
            $invitedplayer->rejected = Input::get('rejected');

        if ($invitedplayer->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function deleteInvitedPlayer($id, $userId) {
        $invitedplayer = InvitedPlayer::where('id', $id)->where('userId', $userId)->get();

        if ($invitedplayer->delete())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
        
    }
}
