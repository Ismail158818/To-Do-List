<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // bigint غير موقع
            $table->string('task_name');
            $table->string('status')->default('0');
            $table->string('content');
            $table->boolean('is_overdue')->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // متطابق مع جدول users
            $table->foreignId('type_id')->constrained()->onDelete('cascade'); // متطابق مع جدول types
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
