<?php

namespace App\Http\Livewire\Custom\Pages\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class Index extends Component
{
    public $jurusan;

    public function mount()
    {
        $this->jurusan = Jurusan::with('schools')->get();
    }

    public function render()
    {
        return view('livewire.custom.pages.jurusan.index');
    }
}