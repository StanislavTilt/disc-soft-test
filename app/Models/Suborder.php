<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Suborder
 * @package App\Models
 */
class Suborder extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'suborders';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'order_id`'
    ];
}
