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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('class', ['10', '11', '12']);
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('school_id');
            $table->string('phoneNumber');
            $table->string('address');
            $table->unsignedBigInteger('schoolAdvisor_id');
            $table->string('profilePhoto');
            $table->string('fatherName');
            $table->string('fatherJob');
            $table->string('motherName');
            $table->string('motherJob');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
