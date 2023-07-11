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

    public function scopeContactSearch($query, $fullname, $gender, $start_date, $end_date, $email)
    {
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%'.$fullname.'%');
        }
        if (!empty($gender)) {
            if ($gender !== '') {
                $query->where('gender', $gender);
            }
        }
        if (!empty($start_date)){
            $query->whereDate('created_at','>=',$start_date);
        }
        if (!empty($end_date)){
            $query->whereDate('created_at','<=',$end_date);
        }

        if (!empty($email)) {
            $query->where('email', 'like', '%'.$email.'%');
        }
        return $query;
    }
}