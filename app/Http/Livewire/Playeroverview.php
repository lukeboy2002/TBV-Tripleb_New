<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Livewire\Component;

class Playeroverview extends Component
{
    public Player $player;

    public function mount(Player $player)
    {
        $this->username = $player->username;
        $this->image = $player->image;
        $this->bio = $player->bio;
        $this->city = $player->city;
        $this->birthday = $player->birthday;
        $this->active = $player->active;
        $this->points = $player->points;
        $this->played_games = $player->layed_games;
        $this->won_games = $player->won_games;
    }
    public function render()
    {
        $players = Player::where('active', 1)
            ->simplePaginate(1);

        return view('livewire.playeroverview' ,[
            'players'=>$players
        ]);

    }
}
