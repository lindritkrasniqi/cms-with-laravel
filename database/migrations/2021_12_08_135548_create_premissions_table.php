<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premissions', function (Blueprint $table) {
            $table->id();
            $table->string('policy')->nullable(false);
            $table->boolean('view_any')->nullable(false)->default(false);
            $table->boolean('view_trashed')->nullable(false)->default(false);
            $table->boolean('view')->nullable(false)->default(false);
            $table->boolean('create')->nullable(false)->default(false);
            $table->boolean('update')->nullable(false)->default(false);
            $table->boolean('delete')->nullable(false)->default(false);
            $table->boolean('restore')->nullable(false)->default(false);
            $table->boolean('force_delete')->nullable(false)->default(false);
            $table->bigInteger('role_id')->unsigned();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premissions');
    }
}
