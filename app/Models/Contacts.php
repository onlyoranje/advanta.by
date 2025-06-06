<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable=[
        'company_name',
        'address',
        'coordinates',
        'phones',
        'UNP',
        'bank',
        'email',
        'crm_form',
        'logo',
        'banner_title',
        'banner_desc',
        'banner_url',
        'banner_button',
        'banner_img',
        'features',
        'achievements'
        ];
}
