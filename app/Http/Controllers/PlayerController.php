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
        return view('player.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }
}
