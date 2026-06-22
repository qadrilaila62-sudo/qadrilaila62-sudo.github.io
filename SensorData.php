<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional jika nama tabel sudah jamak, tapi baik untuk memastikannya)
    protected $table = 'sensor_data';

    // Menentukan kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'device_id',
        'tds_value',
        'moisture_value',
    ];
}