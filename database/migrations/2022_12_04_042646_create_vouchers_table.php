<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("campaign_id");
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->string("code", 255);
            $table->string("image", 255)->nullable();
            $table->boolean("is_image_qualified")->default(false);
            $table->boolean("is_redeemed")->default(false);
            $table->timestamp("lock_time")->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
