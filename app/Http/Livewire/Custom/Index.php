<?php

namespace App\Http\Livewire\Custom;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::with('user')->latest()->take(6)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.custom.index');
    }
}
