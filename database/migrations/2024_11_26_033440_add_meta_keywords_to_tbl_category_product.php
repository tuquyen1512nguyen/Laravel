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
    Schema::table('tbl_category_product', function (Blueprint $table) {
        $table->string('category_product_keywords')->default('default_keyword')->change();
    });
}
    
    public function down()
    {
        Schema::table('tbl_category_product', function (Blueprint $table) {
            $table->dropColumn('meta_keywords');
        });
    }
    
};
