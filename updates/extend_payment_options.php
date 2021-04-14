<?php namespace Codecycler\ShopDebug\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class ExtendPaymentOptions extends Migration
{
    public function up()
    {
        Schema::table('lovata_orders_shopaholic_payment_methods', function (Blueprint $table) {
            $table->smallInteger('is_admin_only')->default(0);
        });
    }

    public function down()
    {
        Schema::table('lovata_orders_shopaholic_payment_methods', function (Blueprint $table) {
            $table->dropColumn('is_admin_only');
        });
    }
}
