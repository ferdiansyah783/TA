<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public $fillable = [
        'thumbnail',
        'name',
        'address',
        'phone',
        'status',
    ];

    public function rules()
    {
        return [
            'thumbnail' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ];
    }

    // method for manyToMany relationship with School
    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class);
    }
}
