<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Note extends Model
{
    use SoftDeletes;

    protected $table = 'notes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];
}