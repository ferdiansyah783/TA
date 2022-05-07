<?php

namespace App\Http\Livewire\Custom\Pages\Posts;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert, WithFileUploads;
    public $title;
    public $content;
    public $image;
    public $tags;

    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function mount()
    {
        //
    }
    public function updatedTags()
    {
        $this->tags = $this->tags;
    }

    public function save()
    {
        $this->validate();

        try {

            $post = new \App\Models\Post;
            $post->title = $this->title;
            // slug with carbon time
            $post->slug = Str::slug($this->title . "-" . Carbon::now()->timestamp);
            $post->content = $this->content;
            $post->user_id = auth()->id();
            $post->tags()->sync($this->tags);
            $post->save();

            $this->title = '';
            $this->content = '';

            if (\auth()->user()->is_verified) {
                $this->alert('success', 'Berhasil', [
                    'position' => 'center',
                    'timer' => '',
                    'toast' => false,
                    'text' => 'Sip. Artikel kamu berhasil ditambahkan!',
                    'showCancelButton' => false,
                    'onDismissed' => '',
                    'cancelButtonText' => 'Close',
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'confirmButtonText' => 'Close',
                ]);
            } else {
                $this->alert('success', 'Berhasil', [
                    'position' => 'center',
                    'timer' => '',
                    'toast' => false,
                    'text' => 'Sip. Artikel kamu berhasil ditambahkan! Tunggu hingga admin mengkonfirmasi artikel kamu!',
                    'showCancelButton' => false,
                    'onDismissed' => '',
                    'cancelButtonText' => 'Close',
                    'showConfirmButton' => true,
                    'onConfirmed' => '',
                    'confirmButtonText' => 'Close',
                ]);
            }
        } catch (\Exception$e) {
            $this->alert('error', 'Oups..', [
                'position' => 'center',
                'timer' => '',
                'toast' => false,
                'text' => 'Error: ' . $e->getMessage(),
                'showCancelButton' => false,
                'onDismissed' => '',
                'cancelButtonText' => 'Close',
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'Close',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.custom.pages.posts.create');
    }
}