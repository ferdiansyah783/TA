<?php

namespace App\Http\Livewire\Custom\Components;

use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class Tags extends LivewireSelect
{

    public $tags, $search;

    public function options($searchTerm = null): Collection
    {

        return collect([
            [
                'value' => 'honda',
                'description' => 'Honda',
            ],
            [
                'value' => 'mazda',
                'description' => 'Mazda',
            ],
            [
                'value' => 'tesla',
                'description' => 'Tesla',
            ],
        ]);
    }

    public function styles()
    {
        return [
            'default' => 'form-select w-50',
            'searchNoResults' => 'text-danger font-weight-bold',
        ];
    }
}