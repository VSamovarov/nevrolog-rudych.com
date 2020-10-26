<?php

namespace App\Entity\Post;

use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Filters\Filterable;
use App\Services\Translation\Translatable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    use Translatable;

    protected $dates = ['deleted_at'];

    protected $appends = ['date_add'];

    /**
     * Аксессоры
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    public function getDateAddAttribute($value)
    {
        return empty($this->created_at) ? null : $this->created_at->format('m-d-Y');
    }
    /**
     * Отношения
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Настройки
     */

    /**
     * Все типы постов (из настроек)
     *
     * @return array|null
     */
    public function getTypes(): ?array
    {
        return config('post_settings.types');
    }

    /**
     * Все статусы постов (из настроек)
     *
     * @return array|null
     */
    public function getStatuses(): ?array
    {
        return config('post_settings.statuses');
    }
}
