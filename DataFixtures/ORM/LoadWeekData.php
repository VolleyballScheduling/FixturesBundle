<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadWeekData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\EnrollmentBundle\Repository\WeekRepository');
        
        for ($i = 1, $f = 1, $s = 1; $i <= $this->getFixtureMax('week'); $i++) {
            $week = $this->getRepository()->createNew();
            
            $week->setName($this->faker->name);
            $week->setSeason($this->getReference('Volleyball.Season-'.$s));
            $week->setStart($this->faker->dateTimeThisMonth((0 == $i % 2 ? date('Y')-1 : null)));
            $week->setEnd(
                $this->faker->dateTimeBetween(
                    '+7 days',
                    $week->getStart()
                )
            );
            $week->setFacility($this->getReference('Volleyball.Facility-'.$f));
                        
            $week->isSpecial(($i % 2));
            
            $this->setReference('Volleyball.Week-'.$i, $week);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            // 2 seasons per facility, 2 weeks per season == 4 loops before incrementation
            $f = (0 == $i % 4) ? ++$f : $f;
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 14;
    }
}
