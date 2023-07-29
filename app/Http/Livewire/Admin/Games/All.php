<?php

namespace App\Http\Livewire\Admin\Games;

use App\Models\Player;
use Livewire\Component;

class All extends Component
{
    public $editedPlayerIndex = null;
    public $editedPlayerField = null;
    public $players = [];

    public $sortField;

    public $sortAsc = true;

    protected $queryString = ['sortAsc', 'sortField'];

    protected $validationAttributes = [
        'players.*.points' => 'points',
        'players.*.played_games' => 'played_games',
    ];

    protected $rules = [
        'players.*.points' => ['required', 'numeric'],
        'players.*.played_games' => ['required', 'numeric'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount()
    {
        $this->players = Player::all()->toArray();
    }

//    public function render()
//    {
//        return view('livewire.admin.games.all', [
//            'players' => $this->players
//        ]);
//    }

    public function render()
    {
        $players = Player::query()
            ->orderby('played_games', 'desc')
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->get()
            ->toArray();

        return view('livewire.admin.games.all', compact('players'));
    }

    public function editPlayer($playerIndex)
    {
        $this->editedPlayerIndex = $playerIndex;
    }

    public function editPlayerField($playerIndex, $fieldName)
    {
        $this->editedPlayerField = $playerIndex . '.' . $fieldName;
    }

    public function savePlayer($playerIndex)
    {
        $this->validate();

        $player = $this->players[$playerIndex] ?? NULL;
        if (!is_null($player)) {
            optional(Player::find($player['id']))->update($player);
        }
        $this->editedPlayerIndex = null;
        $this->editedPlayerField = null;
    }
}
