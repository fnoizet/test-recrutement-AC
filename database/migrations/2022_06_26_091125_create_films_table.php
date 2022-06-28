<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('genre');
            $table->string('release_date');
            $table->timestamps();
        });

        $films = [
            ["Edward aux mains d'argent", "fantastique", 1990],
            ["Nikita", "thriller", 1990],
            ["La famille Adams", "comédie", 1991],
            ["Danse avec les loups", "drame", 1990],
            ["Jurassik Park", "aventure", 1993],
            ["The Mask", "comédie", 1994],
            ["Forrest Gump", "drame", 1994],
            ["Léon", "thriller", 1994],
            ["Esprits rebelles", "drame", 1995],
            ["Braveheart", "action", 1995],
            ["Jumanji", "aventure", 1996],
            ["Le Cinquième élément", "fantastique", 1997]

        ];

        foreach($films as $film) {
            DB::table('films')->insert(
                [
                    'title' => $film[0],
                    'genre' => $film[1],
                    'release_date' => $film[2]
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
