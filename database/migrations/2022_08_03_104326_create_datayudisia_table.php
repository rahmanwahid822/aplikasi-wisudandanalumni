<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatayudisiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datayudisia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bukti_perpus')->nullable();
            $table->string('bukti_revisi')->nullable();
            $table->string('bukti_legalijazah')->nullable();
            $table->string('bukti_legalkk')->nullable();
            $table->string('bukti_akta')->nullable();
            $table->string('bukti_khs')->nullable();
            $table->string('bukti_pkn')->nullable();
            $table->string('bukti_ta')->nullable();
            $table->string('bukti_linkta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datayudisia');
    }
}
