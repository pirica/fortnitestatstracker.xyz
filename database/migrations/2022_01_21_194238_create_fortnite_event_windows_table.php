<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFortniteEventWindowsTable extends Migration
{
    public function up(): void
    {
        Schema::create('fortnite_event_windows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_id')->index();
            $table->string('window_id');
            $table->string('begin_time');
            $table->string('end_time');
            $table->timestamps();

            $table->foreign('event_id')->references('event_id')->on('fortnite_events')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fortnite_event_windows');
    }
}
