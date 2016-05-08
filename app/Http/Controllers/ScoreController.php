<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class ScoreController extends Controller
{
    public function getAllScores() {
        return Score::all();
    }

    public function getScore($id) {
        return Score::where('userId', $id)->get();
    }

    public function createScore() {
        $score = new Score();
        $score->userId = Input::get('userId');

        if(Input::has('score'))
            $score->score = Input::get('score');

        if ($score->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);

    }

    public function updateScore($id) {
        $score = Score::where('userId', $id)->get();

        if(Input::has('score')) {
            $score->score = Input::get('score');
        }

        if ($score->save())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }

    public function deleteScore($id) {
        $score = Score::where('userId', $id)->get();

        if ($score->delete())
            return new Response("{'succeed':'TRUE'}", 200);
        else
            return new Response("{'succeed':'FALSE'}", 500);
    }
}
