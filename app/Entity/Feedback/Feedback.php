<?php

namespace App\Entity\Feedback;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Filters\Filterable;

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $dates = ['deleted_at'];
    protected $fillable = ['feedback_name', 'feedback_email', 'feedback_telephone', 'feedback_message', 'form_data'];
}