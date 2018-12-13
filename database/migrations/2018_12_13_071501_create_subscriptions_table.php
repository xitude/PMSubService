<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('msisdn');
            $table->timestamps();
        });

        Schema::create('subscription_subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('subscription_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscription_id');

            /* @todo I would prefer this to be an integer so I changed it from varchar */
            $table->integer('product_id');

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
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('subscription_subscribers');
        Schema::dropIfExists('subscription_products');
    }
}
