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
        //
        Schema::create('pay_later_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pay_later_item_id')->constrained('pay_later_items')->cascadeOnDelete();
            $table->decimal('amount', 12,2);
            $table->timestamp('paid_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
