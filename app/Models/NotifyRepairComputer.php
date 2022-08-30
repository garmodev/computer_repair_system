<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyRepairComputer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'notify_repair_computer';
    protected $fillable = [
        'user_repair',
        'code_computer',
        'room',
        'row',
        'position',
        'data_repair',
        'data_finish',
        'cause',
        'note',
        'name_repair',
        'status',

    ];
}
