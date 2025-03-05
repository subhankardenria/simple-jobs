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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('employer_id');
            $table->foreignIdFor(App\Models\Employer::class);
            $table->string('title');
            $table->text('description');
            $table->json('locations');
            $table->enum('type', ['Full-time', 'Part-time'])->default('Full-time');
            $table->string('salary');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
