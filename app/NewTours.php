<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewTours extends Model
{
    protected $table='tour_du_lichs';
    protected $fillable=['dia_diem','lich_trinh','so_luong_khach','created_at'];
    public $timestamps = true;
}
