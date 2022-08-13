<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datawisuda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'bukti_lunasijazahwisuda',
        'bukti_pembayaranperpus',
        'bukti_sumbanganalumni',
        'bukti_fototigaempat',
        'bukti_fotoduatiga',
        'bukti_empatenam',
        'bukti_laporanta',
        'bukti_laporanpkn',
        'bukti_linkta',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
