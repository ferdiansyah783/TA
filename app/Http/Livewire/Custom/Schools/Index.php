<?php

namespace App\Http\Livewire\Custom\Schools;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // $this->posts = ;
    }

    public function render()
    {
        return view('livewire.custom.schools.index', [
            'posts' => \App\Models\School::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('major', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}
