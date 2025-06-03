<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable=['company_name','address', 'coordinates','phones','UNP','bank','email','crm_form'];
}
