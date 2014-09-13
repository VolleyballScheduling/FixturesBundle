<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadPeriodData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\EnrollmentBundle\Repository\PeriodRepository');
        
        for ($i = 1, $w = 1; $i <= $this->getFixtureMax('period'); $i++) {
            $period = $this->getRepository()->createNew();
            
            $period->setName($this->faker->name);
            $period->setWeek($this->getReference('Volleyball.Week-'.$w));
            $period->setStart($this->faker->time('H:i:s'));
            $period->setEnd(
                $this->faker->dateTimeBetween(
                    '+45 minutes',
                    $period->getStart()
                )
            );
            
            if (0 == $i % 2) {
                $period->isSpecial(true);
            }
            
            $this->setReference('Volleyball.Period-'.$i, $period);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            $w = (0 == $i % 3) ? ++$w : $w;
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 15;
    }
}
