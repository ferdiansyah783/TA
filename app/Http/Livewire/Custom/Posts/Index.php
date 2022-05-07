<?php

namespace App\Http\Livewire\Custom\Posts;

use App\Models\Post;
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
        // $this->posts = Post::with('user')->latest()->take(10)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.custom.posts.index', [
            'posts' => Post::with('user')->latest()->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
            // also search by name of user
                ->orWhereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->paginate(8),
        ]);
    }
}