<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'description',
    'rules',
    'start_date',
    'end_date',
    'created_by',
    'image'
];


    // ⚡ Agregar casts para fechas
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Relaciones
    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function participants()
    {
        return $this->hasMany(Participation::class);
    }

    public function prize()
    {
        return $this->hasOne(Prize::class);
    }

    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }
}
