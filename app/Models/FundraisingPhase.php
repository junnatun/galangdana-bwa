<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundraisingPhase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'notes',
        'fundraising_id',
        'photo',
    ];

    public function fundraising()
    {
        return $this->belongsTo(Fundraising::class);
    }
}
