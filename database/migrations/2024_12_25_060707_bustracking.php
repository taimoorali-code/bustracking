<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'driver', 'student'])->default('student');
            $table->timestamps();
        });

        // Buses Table
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number')->unique();
            $table->integer('capacity');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Routes Table
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Stops Table
        Schema::create('stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('sequence');
            $table->timestamps();
        });

        // Bus Routes Table
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained()->onDelete('cascade');
            $table->foreignId('route_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        // Bus Tracking Table
        Schema::create('bus_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained()->onDelete('cascade');
            $table->foreignId('stop_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['arrived', 'departed'])->default('departed');
            $table->timestamp('estimated_arrival_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bus_tracking');
        Schema::dropIfExists('bus_routes');
        Schema::dropIfExists('stops');
        Schema::dropIfExists('routes');
        Schema::dropIfExists('buses');
        Schema::dropIfExists('users');
    }
};
