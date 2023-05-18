<?php
declare(strict_types=1);

namespace App\Models\Feature;

use Database\Factories\TodoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'priority',
        'desc',
        'start',
        'end'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    protected static function newFactory(): TodoFactory
    {
        return TodoFactory::new();
    }
}
