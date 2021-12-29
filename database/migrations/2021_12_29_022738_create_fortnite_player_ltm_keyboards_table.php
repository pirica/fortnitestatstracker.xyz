<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFortnitePlayerLTMKeyboardsTable extends Migration
{
    public function up()
    {
        Schema::create('fortnite_player_ltm_keyboards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_id')->index();
            $table->unsignedBigInteger('score');
            $table->unsignedDouble('scorePerMin');
            $table->unsignedDouble('scorePerMatch');
            $table->unsignedBigInteger('wins');
            $table->unsignedBigInteger('kills');
            $table->unsignedBigInteger('killsPerMin');
            $table->unsignedBigInteger('killsPerMatch');
            $table->unsignedBigInteger('deaths');
            $table->float('kd', 22,2);
            $table->unsignedBigInteger('matches');
            $table->float('winRate', 22,2);
            $table->unsignedBigInteger('minutesPlayed');
            $table->unsignedBigInteger('playersOutlived');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('account_id')->references('account_id')->on('fortnite_players')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fortnite_player_LTM_keyboards');
    }
}
