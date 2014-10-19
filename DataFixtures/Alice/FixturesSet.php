<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\Alice;

$set = new \H4cc\AliceFixturesBundle\Fixtures\FixtureSet(
    array(
        'locale' => 'en_US',
        'seed' => 69,
        'do_drop' => true,
        'do_persist' => true
    )
);

$set->addFile(__DIR__.'/fixtures.yml', ' yaml');

return $set;
