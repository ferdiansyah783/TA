<?php

namespace App\Http\Livewire\Custom\Pages\Jurusan;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Livewire\Component;
use \Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{
    public $name, $description, $slug;
    use LivewireAlert;
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);

    }

    public function save()
    {
        $this->validate();

        $jurusan = new Jurusan();
        $jurusan->name = $this->name;
        $jurusan->description = $this->description;
        $jurusan->slug = $this->slug;
        $savedData = $jurusan->save();

        if ($savedData) {
            $this->alert('success', 'Berhasil!', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'text' => 'Data jurusan berhasil ditambahkan.',
                'confirmButtonText' => 'close',
            ]);

            $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.custom.pages.jurusan.create');
    }
}