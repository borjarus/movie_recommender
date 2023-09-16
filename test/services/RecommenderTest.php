<?php

namespace Test\services;

use App\services\Recommender;
use PHPUnit\Framework\TestCase;

class RecommenderTest extends TestCase
{
    private $service;
    protected function setUp():void
    {
        $this->service = new Recommender();

    }
    public function testReturnsThreeRandomTitles()
    {
        $titles = $this->service->getRandomTitles();

        // is returned value is an array
        $this->assertIsArray($titles);

        // is returned array has exactly 3 elements
        $this->assertCount(3, $titles);

        // is titles are unique
        $this->assertTrue(array_unique($titles) === $titles);
    }

    public function testEveryStartitngFromWLetter()
    {
        $movies = $this->service->filter([
            'letter' => 'w',
            'withEvenNumberCharacters' => true
        ]);

        // is titles start with the letter w
        foreach ($movies as $movie) {
            self::assertTrue(str_starts_with(strtolower($movie), 'w'));
        }

        // is titles have an even number of characters
        foreach ($movies as $movie) {
            self::assertTrue(strlen($movie) % 2 == 0);
        }

    }
}
