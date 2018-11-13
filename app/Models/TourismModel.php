<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourismModel extends Model
{
 use SoftDeletes;
 protected $dates = ['deleted_at'];
 protected $table = 'tourismplaces';

 protected $fillable = [
  'nameofplace',
  'locationofplace',
  'district',
  'intrestingthing',
  'image1',
  'image2',
  'description',
  'details',
  'created_at',
 ];

}
