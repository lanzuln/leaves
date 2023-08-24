<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','email','role','password','departmant'];


    public function leave(): HasMany
    {
        return $this->hasMany(Leave::class);
    }
}
