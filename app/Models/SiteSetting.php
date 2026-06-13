<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'cta_whatsapp',
        'price_starter',
        'price_pro',
        'price_enterprise',
    ];
}
