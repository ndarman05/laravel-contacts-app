<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterScope;
use App\Scopes\SearchScope;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'address', 'company_id'];
    
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function scopeLatestFirst($query){
        return $query->orderBy('id', 'desc');
    }

    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new FilterScope);
        static::addGlobalScope(new SearchScope);
    }
}
