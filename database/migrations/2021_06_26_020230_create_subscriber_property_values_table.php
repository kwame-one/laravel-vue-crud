<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriberPropertyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriber_property_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscriber_id')
                ->constrained('subscribers')
                ->onDelete('cascade');

            $table->string('org_id');

            $table->foreignId('subscriber_property_id')
                ->constrained('subscriber_properties')
                ->onDelete('cascade');

            $table->string('value');
            $table->timestamp('updated_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriber_property_values');
    }
}
