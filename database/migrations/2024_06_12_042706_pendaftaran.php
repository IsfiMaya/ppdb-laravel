<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('data_diri_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('data_diri_id')
                ->references('id')
                ->on('data_diri')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string("NPSN", "100")->nullable(false);
            $table->string("ijazah", "100")->nullable(false);
            $table->string("kk", "100")->nullable(false);
            $table->string("akta_lahir", "100")->nullable(false);
            $table->string("nilai_raport", "100")->nullable(false);
            $table->string("prestasi1", "100")->nullable(false);
            $table->string("prestasi2", "100")->nullable(false);
            $table->string("prestasi3", "100")->nullable(false);
            $table->string("b_pembayaran", "100")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
