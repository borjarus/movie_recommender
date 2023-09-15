<?php

namespace Test\services;

use App\services\Recommender;
use PHPUnit\Framework\TestCase;

class RecommenderTest extends TestCase
{
    public function testReturnsThreeRandomTitles()
    {
        $service = new Recommender();
        $titles = $service->getRandomTitles();

        // czy zwrócona wartość to tablica
        $this->assertIsArray($titles);

        // czy zwrócona tablica ma dokładnie 3 elementy
        $this->assertCount(3, $titles);

        // czy tytuły są unikalne
        $this->assertTrue(array_unique($titles) === $titles);
    }
}
