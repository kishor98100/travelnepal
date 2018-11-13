<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerModel extends Model
{
 use SoftDeletes;
 protected $dates = ['deleted_at'];
 protected $table = 'partners';

 protected $fillable = [
  'nameofcompany',
  'address',
  'district',
  'contact',
  'phoneno',
  'description',
  'image1',
  'image2',
  'details',
  'services',
 ];

}
