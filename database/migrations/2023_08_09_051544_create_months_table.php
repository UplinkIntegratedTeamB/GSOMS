<?php

use App\Models\Month;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $now = now();

        $months = [
            ['name' => 'January', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'February', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'March', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'April', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'May', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'June', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'July', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'August', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'September', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'November', 'create_at' => $now, 'updated_at' => $now ],
            ['name' => 'December', 'create_at' => $now, 'updated_at' => $now ],
        ];

        foreach($months as $monthData) {
            Month::create($monthData);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('months');
    }
};
