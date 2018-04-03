<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'user', 'assign_to', 'start_date', 'end_date', 'attache', 'link'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user');
    }

    public function assignTo()
    {
        return $this->belongsTo('App\User', 'assign_to');
    }
}
