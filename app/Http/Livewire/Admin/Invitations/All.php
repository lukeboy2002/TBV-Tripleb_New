<?php

namespace App\Http\Livewire\Admin\Invitations;

use App\Models\Invitation;
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
        return view('livewire.admin.invitations.all', [
            'invitations' => Invitation::orderby('active')
                ->where(function ($query) {
                    $query->where('email', 'like', '%' . $this->search . '%')
                        ->orWhere('invited_by', 'like', '%' . $this->search . '%');
                })
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
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
        $invitation = Invitation::find($this->deleteId);

        $invitation->delete();

        $this->showModal = false;

        session()->flash('success', 'Invitation deleted successfully!');
    }

    public function close()
    {
        $this->showModal = false;
    }
}
