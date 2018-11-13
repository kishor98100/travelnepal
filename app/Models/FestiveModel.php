<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FestiveModel extends Model
{

 use SoftDeletes;

 protected $dates = ['deleted_at'];

 protected $table    = 'festivals';
 protected $fillable = [
  'nameoffestival',
  'date',
  'image1',
  'image2',
  'description',
  'details',
 ];

}
