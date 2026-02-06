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
    Schema::table('orders', function (Blueprint $table) {

        if (!Schema::hasColumn('orders', 'order_code')) {
            $table->string('order_code')->after('user_id');
        }

        if (!Schema::hasColumn('orders', 'subtotal')) {
            $table->decimal('subtotal', 8, 2)->after('order_code');
        }

        if (!Schema::hasColumn('orders', 'delivery')) {
            $table->decimal('delivery', 8, 2)->default(0);
        }

        if (!Schema::hasColumn('orders', 'payment_method')) {
            $table->string('payment_method')->nullable();
        }

    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {

        if (Schema::hasColumn('orders', 'order_code')) {
            $table->dropColumn('order_code');
        }

        if (Schema::hasColumn('orders', 'subtotal')) {
            $table->dropColumn('subtotal');
        }

        if (Schema::hasColumn('orders', 'delivery')) {
            $table->dropColumn('delivery');
        }

        if (Schema::hasColumn('orders', 'payment_method')) {
            $table->dropColumn('payment_method');
        }

    });
}


};
