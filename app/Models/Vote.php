<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table = "votes";
    protected $guarded = [];

    public function pemilih()
    {
        return $this->belongsTo(User::class, 'pemilih_id');
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
