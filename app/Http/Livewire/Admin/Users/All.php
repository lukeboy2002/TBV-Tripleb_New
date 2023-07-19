<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $showModal = false;

    public $search;

    public $sortField;

    public $sortAsc = true;

    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.admin.users.all', [
            'users' => User::role('user')
                ->orderby('logged_in', 'desc')
                ->where(function ($query) {
                    $query->where('username', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->with('roles')
                ->withTrashed()
                ->latest()
                ->paginate(10),
        ]);
    }

    public function deleteId($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        $user = User::find($this->deleteId);

        $user->delete();

        $this->showModal = false;

        session()->flash('success', 'User deleted successfully!');
    }

    public function close()
    {
        $this->showModal = false;
    }
}
