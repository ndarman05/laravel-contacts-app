<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'email', 'address'];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
