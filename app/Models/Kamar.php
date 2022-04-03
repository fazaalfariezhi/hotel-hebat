<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [''];
    


    public function fasilitas_kamar()
    {
        return $this->belongsToMany(FasilitasKamar::class);
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'type_kamar'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }


}
