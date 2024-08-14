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
        Schema::create('data_diri', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string("nama", "100")->nullable(false);
            $table->string("alamat", "100")->nullable(false);
            $table->date("tanggal_lahir")->nullable(false);
            $table->string("jenis_kelamin", "100")->nullable(false);
            $table->string("NISN", "100")->nullable(false);
            $table->string("agama", "100")->nullable(false);
            $table->string("email", "100")->nullable(false);
            $table->char("no_handphone", "12")->nullable();
            $table->string("nama_ayah", "100")->nullable(false);
            $table->string("pekerjaan_ayah", "100")->nullable(false);
            $table->string("nama_ibu", "100")->nullable(false);
            $table->string("pekerjaan_ibu", "100")->nullable(false);
            $table->string("total_pendapatan", "100")->nullable(false);
            $table->char("no_handphone_orangtua", "12")->nullable(false);
            $table->string("pas_photo", "100")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_diri');
    }
};
