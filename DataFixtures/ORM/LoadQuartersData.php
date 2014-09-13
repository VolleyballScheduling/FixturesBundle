<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadQuartersData extends DataFixture
{
    /**
     * {@inheritdoc} 
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\FacilityBundle\Repository\QuartersRepository');

        for ($i = 1, $f = 1, $type = true; $i <= 160; $i++) {
            $quarters = new \Volleyball\Bundle\FacilityBundle\Entity\Quarters();
            
            $quarters->setName($this->faker->name);
            $quarters->setFacility($this->getReference('Volleyball.Facility-'.$f));
            $quarters->setCapacity(10);
            
            $type ^= true;
            $quarters->setType(($type ? 'passel' : 'faculty' ));
            
            // 4 quarters per facility (2 passel, 2 faculty)
            $f = (0 == $i % 4) ? ++$f : $f;

            $this->setReference('Volleyball.Quarters-'.$i, $quarters);
            
            $manager->persist($quarters);
            
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
        return 10;
    }
}
