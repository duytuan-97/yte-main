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
        Schema::create('products', function (Blueprint $table) {
            // $table->uuid('id')->primary();
            $table->id();
            // $table->uuid('product_type_id');
            // $table->foreign('product_type_id')->references('id')->on('product_types')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->int('product_type_id')->constrained('product_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('product_type_id')->unsigned();
            // Thêm foreign key constraint
            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->double('price')->default(0);
            $table->longText('purpose')->nullable();
            $table->longText('use')->nullable();
            $table->longText('drug_facts')->nullable();
            $table->json('images');
            $table->boolean('display')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
