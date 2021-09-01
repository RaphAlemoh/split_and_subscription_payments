<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id');
            $table->integer('plan_id');
            $table->string('subcribed_for')->nullable();
            $table->string('subscription_code')->nullable();
            $table->string('subscribed_on')->nullable();
            $table->string('next_charged_date')->nullable();
            $table->string('reference')->nullable();
            $table->string('authorization_code')->nullable();
            $table->string('next_payment_date')->nullable();
            $table->string('signature')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('transaction')->nullable();
            $table->integer('status')->default(0);
            $table->dateTimeTz('sub_created_at')->nullable();
            $table->dateTimeTz('created_at')->nullable();
            $table->dateTimeTz('paid_at')->nullable();
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
    }
}
