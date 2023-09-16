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
        $titles = $this->service->filter([
            'letter' => 'w',
            'withEvenNumberCharacters' => true
        ]);

        // is titles start with the letter w
        foreach ($titles as $title) {
            self::assertTrue(str_starts_with(strtolower($title), 'w'));
        }

        // is titles have an even number of characters
        foreach ($titles as $title) {
            self::assertTrue(strlen($title) % 2 == 0);
        }
    }

    public function testEveryWithMoreThanOneWord()
    {
        $titles = $this->service->filter([
            'withMoreThanOneWord' => true
        ]);

        // is titles consist of more than 1 word
        foreach ($titles as $title) {
            self::assertTrue(count(explode(' ', $title)) > 1);
        }
    }
}
