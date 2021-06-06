<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;

    public $table = 'logs';

    protected $fillable = [
        'article_id',
        'user_id',
        'action',
        'comment',
    ];
}
