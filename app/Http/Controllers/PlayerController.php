<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $players = Player::where('active', 1)
            ->simplePaginate(1);

        return view('player.index' ,[
            'players'=>$players
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }
}
