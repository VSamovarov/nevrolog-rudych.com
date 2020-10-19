<?php

namespace App\Entity\Feedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Filters\Filterable;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $dates = ['deleted_at'];
    protected $fillable = ['feedback_name', 'feedback_email', 'feedback_telephone', 'feedback_message', 'form_data'];

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

    public function getDateAddAttribute($value)
    {
        return $this->created_at->format('m-d-Y');
    }
}