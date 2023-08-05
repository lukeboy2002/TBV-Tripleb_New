<?php

namespace App\Http\Livewire\Profile;

use App\Models\Player;
use App\Models\User;
use Livewire\Component;

class UpdatePlayerInformationForm extends Component
{
    public User $user;

    public Player $player;

    public $bio;

    public $city;

    public $birthday;

    protected $rules = [
        'bio' => 'nullable|min:6',
        'city' => 'nullable|min:3',
        'birthday' => 'nullable|date',
    ];

    protected $listeners = ['changeDate' => 'changeDate'];

    public function changeDate($date)
    {
        $this->birthday = $date;
    }

    public function mount(User $user)
    {
        $player = $user->player()->firstOrNew();
        $this->bio = $player->bio;
        $this->city = $player->city;
        $this->birthday = $player->birthday;
    }

    public function render()
    {
        return view('profile.update-player-information-form');
    }

    public function save()
    {
        $this->validate();

        $player = $this->user->player()->firstOrNew();

        $player->user_id = $this->user->id;
        $player->bio = $this->bio;
        $player->city = $this->city;
        $player->birthday = $this->birthday;
        $player->save();

        session()->flash('success_small', 'User has been updated');
    }
}
