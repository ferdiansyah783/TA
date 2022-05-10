<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    public $fillable = ['name', 'slug', 'description'];

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:jurusans',
            'description' => 'required|string|max:255',
        ];
    }

    // method for manyToMany relationship with School
    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}