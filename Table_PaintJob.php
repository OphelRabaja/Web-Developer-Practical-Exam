<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintJobsTable extends Migration
{
  public function up()
  {
    Schema::create('paint_jobs', function (Blueprint $table)
    {
      $table->id();
      $table->string('car_details');
      $table->string('customer_name')
      $table->enum('paint_color', ['red', 'green', 'blue']);
      $table->enum('status', ['queued', 'active', 'completed'])->default('queued');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('paint_jobs');
  }
}
