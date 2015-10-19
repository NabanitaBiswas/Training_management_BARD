<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     protected $fillable = ['course_name', 'introduction','objectives','course_contents','training_methods','participants','duration','academic_staff','course_fee','accommodation_and_food','library','award','address_for_correspondence','training_id','course_image'];
}
