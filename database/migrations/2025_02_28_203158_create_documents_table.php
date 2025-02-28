<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_relevant')->default(true);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('file_path')->nullable();
            $table->foreignId('type_id')->nullable()->constrained('document_types')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
