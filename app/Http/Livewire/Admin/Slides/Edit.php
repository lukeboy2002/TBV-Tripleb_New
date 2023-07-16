<?php

namespace App\Http\Livewire\Admin\Slides;

use App\Models\Slide;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Slide $slide;

    public $title;

    public $color_title;

    public $subtitle;

    public $color_subtitle;

    public $image;

    public $active;

    protected $rules = [
        'title' => 'required|string|max:40',
        'color_title' => 'nullable|string',
        'subtitle' => 'required|string|max:100',
        'color_subtitle' => 'nullable|string|',
        'image' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 1MB Max
        'active' => 'nullable',
    ];

    protected $messages = [
        'title.max' => 'The title may not be greater than 40 characters',
        'subtitle.max' => 'The subtitle may not be greater than 100 characters',
    ];

    public function updatedTitle()
    {
        $this->validateOnly('title');
    }

    public function updatedSubtitle()
    {
        $this->validateOnly('subtitle');
    }

    public function mount(Slide $slide)
    {
        $this->title = $slide->title;
        $this->color_title = $slide->color_title;
        $this->subtitle = $slide->subtitle;
        $this->color_subtitle = $slide->color_subtitle;
        $this->active = $slide->active;
    }

    public function render()
    {
        return view('livewire.admin.slides.edit');
    }

    public function save()
    {
        $this->validate();

        $this->slide->update([
            'title' => $this->title,
            'color_title' => $this->color_title,
            'subtitle' => $this->subtitle,
            'color_subtitle' => $this->color_subtitle,
            'active' => $this->active,
        ]);

        if ($this->image) {
            $previousImagePath = $this->slide->image;
            Storage::delete($previousImagePath);

            $this->image->storeAs('slides', $this->slide->id.'.'.$this->image->extension());
            $this->slide->update(['image' => 'slides/'.$this->slide->id.'.'.$this->image->extension()]);
        }
        session()->flash('success', 'Slides has been changed');

        return redirect()->route('admin.slides.index');
    }

}
