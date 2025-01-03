<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use Translatable, HasFactory;
    public $translatedAttributes = ['name', 'appointments'];
    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'phone',
        'price',
        'name',
        'appointments',
        'section_id',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
