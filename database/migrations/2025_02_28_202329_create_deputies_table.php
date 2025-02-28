<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('deputies', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->date('birth_date');
            $table->string('position');
            $table->string('phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deputies');
    }
};
