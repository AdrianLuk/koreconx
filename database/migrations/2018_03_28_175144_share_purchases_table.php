<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SharePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('share_instrument_name');
            $table->integer('quantity');
            $table->decimal('price', 20, 10);
            $table->decimal('total_investment', 11, 2);
            $table->string('certificate_number');
            $table->uuid('user_id');
            $table->dateTimeTz('transaction_date')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
}
