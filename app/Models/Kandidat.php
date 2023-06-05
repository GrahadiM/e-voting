<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidats";
    protected $guarded = [];

    public function pemilih()
    {
        return $this->belongsTo(User::class, 'pemilih_id');
    }

    public function vote()
    {
        return $this->hasMany(Vote::class, 'kandidat_id');
    }
}
