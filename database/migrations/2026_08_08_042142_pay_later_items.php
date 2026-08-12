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
        Schema::create('pay_later_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name', 100);
            $table->decimal('amount', 12,2);
            $table->decimal('paid_amount', 12,2)->default(0);
            $table->date('due_date');
            $table->boolean('paid')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->string('description', 100)->nullable();
            $table->string('group_key', 36)->nullable();
            $table->timestamps();
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
