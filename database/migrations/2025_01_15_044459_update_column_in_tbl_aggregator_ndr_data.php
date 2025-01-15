<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tbl_aggregator_ndr_data', function (Blueprint $table) {
            $table->unsignedBigInteger('log_id')->nullable()->after('pickup_address');
            $table->string('ndr_coming_through', 50)->nullable()->after('log_id');

            // Add foreign key constraint
            $table->foreign('log_id')
                ->references('id')
                ->on('tbl_create_ndr_importing_logs')
                ->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tbl_aggregator_ndr_data', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['log_id']);

            // Drop the columns
            $table->dropColumn(['log_id', 'ndr_coming_through']);
        });
    }
};
