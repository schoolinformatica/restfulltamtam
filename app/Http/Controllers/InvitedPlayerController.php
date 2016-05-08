<?php

namespace App\Http\Controllers;

use App\InvitedPlayer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class InvitedPlayerController extends Controller
{
    public function getInvitedPlayer($id) {
        return InvitedPlayer::find($id);
    }

    public function getInvitedPlayerByUserId($id) {
        return InvitedPlayer::where('userId', $id)->get();
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

    public function updateInvitedPlayer($id, $userId) {
        $invitedplayer = InvitedPlayer::where('id', $id)->where('userId', $userId)->get();

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
