<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $attributes)
 * @method static latest()
 * @property mixed $completed
 * @property mixed $name
 * @property mixed $id
 */
class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];
}
