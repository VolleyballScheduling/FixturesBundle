<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadSeasonData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1, $f = 1; $i <= $this->getFixtureMax('season'); $i++) {
            $season = $this->getSeasonRepository()->createNew();
            
            $season->setName($this->faker->name);
            
            if (0 == $i % 2) {
                $season->setYear(date('Y'))-1;
                $f++;
            } else {
                $season->setYear($this->faker->date('Y'));
            }
            $season->setFacility($this->getReference('Volleyball.Facility-'.$f));

            $this->setReference('Volleyball.Season-'.$i, $season);
            
            $manager->persist($season);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 13;
    }
}
