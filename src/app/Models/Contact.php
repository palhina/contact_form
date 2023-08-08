<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    public static $rules = array(
        'fullname' => ['required'],
        'gender' => ['required'],
        'email' => ['required', 'string', 'email'],
        'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/' ],
        'address' => ['required', 'string'],
        'building_name' => ['nullable','string'],
        'opinion' => ['required', 'string','max:120'],
    );

    public function scopeFullnameSearch($query, $fullname)
    {
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%'. $fullname .'%');
        }
    }
}