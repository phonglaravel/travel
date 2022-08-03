<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tour_trongnuoc';
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
