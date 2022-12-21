<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 15)->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('title', 100)->index();
            $table->string('slug', 160)->unique();
            $table->longText('description');
            $table->integer('price_min');
            $table->integer('price_max');
            $table->enum('status', ['pending_approval', 'pending_payment', 'active', 'completed', 'hidden', 'under_development', 'pending_final_review', 'incomplete', 'closed'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_urgent')->default(false);
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_alert')->default(false);
            $table->timestamp('expiry_date_featured')->nullable();
            $table->timestamp('expiry_date_urgent')->nullable();
            $table->timestamp('expiry_date_highlight')->nullable();
            $table->bigInteger('counter_views')->default(0);
            $table->bigInteger('counter_impressions')->default(0);
            $table->bigInteger('counter_bids')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
