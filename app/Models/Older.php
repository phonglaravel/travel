<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Older extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'older';
    public function tour() {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
}
}