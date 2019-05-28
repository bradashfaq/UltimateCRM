<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRecurringInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recurring_invoices');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('recurring_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned()->index();
            $table->integer('client_id')->unsigned()->index();
            $table->date('last_run');
            $table->date('next_run');
            $table->integer('due_date');
            $table->integer('how_often');
            $table->timestamps();
        });
    }
}
