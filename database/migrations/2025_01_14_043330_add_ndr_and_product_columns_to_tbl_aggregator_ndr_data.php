<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbl_aggregator_ndr_data', function (Blueprint $table) {
            //
            $table->dateTime('ndr_1_attempt_date')->nullable()->after('number_of_attempts')->comment('Date and time of the first NDR attempt');
            $table->text('ndr_1_remark')->nullable()->after('ndr_1_attempt_date')->comment('Remark for the first NDR attempt');
            $table->dateTime('ndr_2_attempt_date')->nullable()->after('ndr_1_remark')->comment('Date and time of the second NDR attempt');
            $table->text('ndr_2_remark')->nullable()->after('ndr_2_attempt_date')->comment('Remark for the second NDR attempt');
            $table->dateTime('ndr_3_attempt_date')->nullable()->after('ndr_2_remark')->comment('Date and time of the third NDR attempt');
            $table->text('ndr_3_remark')->nullable()->after('ndr_3_attempt_date')->comment('Remark for the third NDR attempt');
            $table->integer('product_quantity')->nullable()->after('product_name')->comment('Quantity of the product ordered');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_aggregator_ndr_data', function (Blueprint $table) {
            //
            $table->dropColumn('ndr_1_attempt_date');
            $table->dropColumn('ndr_1_remark');
            $table->dropColumn('ndr_2_attempt_date');
            $table->dropColumn('ndr_2_remark');
            $table->dropColumn('ndr_3_attempt_date');
            $table->dropColumn('ndr_3_remark');
            $table->dropColumn('product_quantity');
        });
    }
};
