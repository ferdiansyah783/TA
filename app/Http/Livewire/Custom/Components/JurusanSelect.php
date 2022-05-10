<?php

namespace App\Http\Livewire\Custom\Components;

use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class JurusanSelect extends LivewireSelect
{
    public function options($searchTerm = \null): Collection
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
            'default' => 'form-select',
            'searchOptionsContainer' => '',
            'search' => 'form-input',
            'searchInput' => 'form-input',
            'searchOptionItem' => '',
            'searchOptionItemActive' => '',
            'searchOptionItemInactive' => '',
        ];
    }
}