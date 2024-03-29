<?php

namespace App\Entity\Feedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Filters\Filterable;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    use Notifiable;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'email', 'phone', 'message', 'form_data'];

    // protected $appends = ['date'];

    /**
     * Параметры запроса, которые участвуют в фильтрации
     *
     * @var array
     */
    protected $filterableParameters = ['viewed', 'date_to', 'date_from', 'name', 'phone', 'email'];


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
}