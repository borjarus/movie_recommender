<?php

namespace App\services;

use function PHPUnit\Framework\stringStartsWith;

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
    public function getRandomTitles(int $number = 3): array
    {
        $r = new \Random\Randomizer();
        return array_slice($r->shuffleArray($this->movies), 0, $number);
    }

    public function filter(array $params)
    {
        return array_filter($this->movies, function ($movieTitle) use ($params) {
            $result = [];
            foreach ($params as $filterName => $filterValue) {
                $result[] = match ($filterName) {
                    'letter' =>  str_starts_with(strtolower($movieTitle), strtolower($filterValue)),
                    'withEvenNumberCharacters' =>  strlen($movieTitle) % 2 == 0,
                    'withMoreThanOneWord' => count(explode(' ', $movieTitle)) > 1

                };
            }
            return $this->all($result);
        });
    }

    /**
     * Load movie list to service
     * @return void
     */
    private function loadMovieList()
    {
        $this->movies = (require (__DIR__ . '/../data/movies.php') ?: []);
    }

    /**
     * check if all elements in array is true
     * @param array $arr
     * @return bool
     */
    private function all(array $arr)
    {
        return array_reduce(
            $arr,
            function($result, $el) {
                return $result && $el;
            },
            true);
    }
}