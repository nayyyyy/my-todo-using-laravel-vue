<?php
declare(strict_types=1);

namespace App\Models\Feature;

use Database\Factories\TodoFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Feature\Todo
 *
 * @property int $id
 * @property string $title
 * @property string $priority
 * @property string $desc
 * @property Carbon $start
 * @property Carbon $end
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static TodoFactory factory($count = null, $state = [])
 * @method static Builder|Todo newModelQuery()
 * @method static Builder|Todo newQuery()
 * @method static Builder|Todo query()
 * @method static Builder|Todo whereCreatedAt($value)
 * @method static Builder|Todo whereDeletedAt($value)
 * @method static Builder|Todo whereDesc($value)
 * @method static Builder|Todo whereEnd($value)
 * @method static Builder|Todo whereId($value)
 * @method static Builder|Todo wherePriority($value)
 * @method static Builder|Todo whereStart($value)
 * @method static Builder|Todo whereTitle($value)
 * @method static Builder|Todo whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Todo extends Model
{
    use HasFactory, SoftDeletes;

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
        'priority' => 'integer',
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    protected static function newFactory(): TodoFactory
    {
        return TodoFactory::new();
    }
}
