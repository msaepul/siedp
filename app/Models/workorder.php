<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workorder extends Model
{
    use HasFactory;

    protected $table = "workorders";
    protected $primarykey = "id";
    protected $fillable = [
        'no_wo',
        'wo_create',
        'kategori_wo',
        'perangkat_id',
        'lokasi',
        'obyek',
        'keadaan',
        'lampiran',
        'user_id'
    ];
    protected $attributes = [
        'status' => "draft",
        
    ];

    public static function generateNomor()
    {
        
        $currentMonth = date('m');
        $currentYear = date('Y');
        $cabang = cabang();

        // Ambil nomor terakhir dari bulan ini
        $lastDocument = workorder::where('no_wo', 'like', 'WO'.'-'.cabang().'/'. $currentYear  .'/'. tgl_id($currentMonth) .'/%')
            ->orderBy('no_wo', 'desc')
            ->first();

        $newNumber = '001'; // Nomor default jika belum ada dokumen pada bulan ini

        if ($lastDocument) {
            // Ambil nomor terakhir dan increment nomor
            $lastNumber = substr($lastDocument->no_wo, -3);
            $newNumber = str_pad((int) $lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        return 'WO'.'-'.cabang().'/'. $currentYear  .'/'. tgl_id($currentMonth) .'/' . $newNumber;
    }
}
