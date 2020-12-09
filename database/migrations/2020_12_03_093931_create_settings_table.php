<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default("Digy Studio");
            $table->text('site_description')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('site_instagram')->nullable();
            $table->string('site_twitter')->nullable();
            $table->string('site_linkedin')->nullable();
            $table->string('site_behance')->nullable();
            $table->string('site_dribbble')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_field_one')->nullable();
            $table->string('site_field_one_value')->nullable();
            $table->string('site_field_two')->nullable();
            $table->string('site_field_two_value')->nullable();
            $table->string('site_field_three')->nullable();
            $table->string('site_field_three_value')->nullable();
            $table->string('site_field_four')->nullable();
            $table->string('site_field_four_value')->nullable();
            $table->string('site_copyright')->nullable();
            $table->string('site_creator_name')->nullable();
            $table->string('site_creator_link')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
