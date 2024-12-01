<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("CREATE TABLE rentals (
            id INT AUTO_INCREMENT PRIMARY KEY,
            book_id INT NOT NULL,
            member_id INT NOT NULL,
            rented_at DATE NOT NULL,
            duration_of_rent INT NOT NULL,
            returned_at DATE NOT NULL,
            operator_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            
            FOREIGN KEY (book_id) REFERENCES books(id),
            FOREIGN KEY (member_id) REFERENCES members(id)
            FOREIGN KEY (operator_id) REFERENCES users(id)
        )");

        DB::statement("CREATE INDEX book_id_index ON rentals (book_id)");
        DB::statement("CREATE INDEX member_id_index ON rentals (member_id)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
