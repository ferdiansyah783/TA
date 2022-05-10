<?php

namespace App\Http\Livewire\Pages\Schools;

use App\Models\School;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($slug)
    {
        $deleted = School::where('slug', $slug)->delete();

        if ($deleted) {
            $this->alert('success', 'Berhasil!', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'text' => 'Data berhasil dihapus.',
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'oke bro',
            ]);
        } else {
            $this->alert('error', 'Gagal!', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'text' => 'Oups.. Data gagal dihapus!',
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'oke bro',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.pages.schools.index', [
            'schools' => \App\Models\School::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ]);
    }
}