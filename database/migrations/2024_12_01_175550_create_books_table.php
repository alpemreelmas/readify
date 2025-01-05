<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       DB::statement("CREATE TABLE books (
            id INTEGER PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            author_id INT NOT NULL,
            picture TEXT,
            summary TEXT,
            page_count INT NOT NULL,
            original_language VARCHAR(255) NOT NULL,
            genre_id INT NOT NULL,
            published_by VARCHAR(255) DEFAULT 'Unknown',
            published_at DATE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
            FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
            FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE
        )");

        DB::statement("CREATE INDEX title_index ON books (title)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TABLE books");
    }
};
