<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;

class Playeroverview extends Component
{
    use WithPagination;

    public function render()
    {
        $players = Player::where('active', 1)
            ->simplePaginate(1);

        return view('livewire.playeroverview' ,[
            'players'=>$players
        ]);

    }
}
