<?php

namespace App\services;

class Recommender
{
    private array $movies;
    public function __construct()
    {
        $this->loadMovieList();
    }

    /**
     * Get n random movie titles
     * @param int $number number of random titles
     * @return array
     */
    public function getRandomTitles(int $number = 3):array
    {
        $r = new \Random\Randomizer();
        return array_slice($r->shuffleArray($this->movies),0,$count);
    }

    /**
     * Load movie list to service
     * @return void
     */
    private function loadMovieList()
    {
        $this->movies = (require(__DIR__.'/../data/movies.php') ?: []);
    }
}