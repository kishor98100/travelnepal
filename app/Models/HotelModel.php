<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelModel extends Model
{
 use SoftDeletes;
 protected $dates = ['deleted_at'];

 protected $table = 'hotels';

 protected $fillable = [
  'nameofhotel',
  'address',
  'district',
  'contact',
  'image1',
  'image2',
  'services',
  'details',
 ];

}
