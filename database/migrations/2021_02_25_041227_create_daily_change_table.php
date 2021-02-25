<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyChangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_change', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('current_market_value',8,3);
            $table->float('total_gain_loss',8,3);
            $table->float('daily_gain_loss',8,3);
            $table->float('total_cost_basis',8,3);
            $table->float('daily_cost_basis_delta',8,3);
            $table->float('total_dividends',8,3);
            $table->float('realized_gains',8,3);
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
        Schema::dropIfExists('daily_change');
    }
}
