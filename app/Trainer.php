<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
     protected $fillable = ['name','gender','educational_qualification', 'previous_experience', 						'date_of_birth','cell_number','email','country','skill_set','slug','status'];
    
    public function feedbacks()
    {
        return $this->hasMany('App\Feedback');
    }
}

