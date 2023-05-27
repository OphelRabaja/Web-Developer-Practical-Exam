<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaintJob extends Model
{
  protected $table = 'paint_jobs';

  protected $fillable = ['car_details', 'customer_name', 'paint_color', 'status'];

  public function scopeActive($query)
  {
    return $query->where('status', 'active');
  }

  public function scopeQueued($query)
  {
    return $query->where('status', 'queued');
  }
}