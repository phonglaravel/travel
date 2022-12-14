<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'countries';
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tour() {
        return $this->hasMany(Tour::class, 'country_id');
    }
}
