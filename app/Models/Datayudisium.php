<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Datayudisium extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'bukti_perpus',
        'bukti_revisi',
        'bukti_legalijazah',
        'bukti_legalkk',
        'bukti_akta',
        'bukti_khs',
        'bukti_pkn',
        'bukti_ta',
        'bukti_linkta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
