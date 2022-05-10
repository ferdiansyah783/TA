<?php

namespace App\Http\Livewire\Pages\Schools;

use App\Models\Jurusan;
use App\Models\School;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public $jurusan, $searchJurusan, $selectedJurusan = [], $namaSekolah, $contactPersonSekolah, $alamatSekolah, $statusSekolah;

    protected $rules = [
        'namaSekolah' => 'required|string|max:255',
        'contactPersonSekolah' => 'required|string|max:255',
        'alamatSekolah' => 'required|string|max:255',
        'selectedJurusan' => 'required|array',
        'statusSekolah' => 'required|in:swasta,negeri',
    ];

    protected $messages = [
        'namaSekolah.required' => 'Nama sekolah tidak boleh kosong',
        'namaSekolah.string' => 'Nama sekolah harus berupa string',
        'namaSekolah.max' => 'Nama sekolah tidak boleh lebih dari 255 karakter',
        'contactPersonSekolah.required' => 'Contact person sekolah tidak boleh kosong',
        'contactPersonSekolah.string' => 'Contact person sekolah harus berupa string',
        'contactPersonSekolah.max' => 'Contact person sekolah tidak boleh lebih dari 255 karakter',
        'alamatSekolah.required' => 'Alamat sekolah tidak boleh kosong',
        'alamatSekolah.string' => 'Alamat sekolah harus berupa string',
        'alamatSekolah.max' => 'Alamat sekolah tidak boleh lebih dari 255 karakter',
        'selectedJurusan.required' => 'Anda harus memilih setidaknya 1 jurusan',
        'selectedJurusan.array' => 'Tipe data jurusan tidak valid',
    ];

    public function mount()
    {
        $this->jurusan = Jurusan::all();
    }

    public function updatedSearchJurusan()
    {
        $this->jurusan = Jurusan::where('name', 'like', '%' . $this->searchJurusan . '%')->get();
    }

    public function updatedSelectedJurusan($jurusan)
    {
        // remove each item in the array if value is false

        // add the new item to the array
        $this->selectedJurusan[] = $jurusan;
    }

    public function save()
    {
        $validated = $this->validate();
        $this->selectedJurusan = \array_values(array_filter($this->selectedJurusan));
        if ($validated) {
            $school = new School();
            $school->name = $this->namaSekolah;
            $school->slug = Str::slug($this->namaSekolah . '-' . Str::random(8));
            $school->thumbnail = null;
            $school->phone = $this->contactPersonSekolah;
            $school->address = $this->alamatSekolah;
            $school->status = $this->statusSekolah;
            $school->save();
            $school->jurusans()->attach($this->selectedJurusan);

            $this->alert('success', 'Berhasil!', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'text' => 'Data sekolah berhasil ditambahkan.',
                'showConfirmButton' => true,
                'onConfirmed' => 'confirmed',
                'confirmButtonText' => 'oke bro',
            ]);
        }

    }

    public function confirmed()
    {
        $this->reset();
        \redirect()->route('sekolah.index');
    }
    public function render()
    {
        return view('livewire.pages.schools.create');
    }
}