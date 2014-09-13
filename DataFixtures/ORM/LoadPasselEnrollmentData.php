<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadPasselEnrollmentData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\EnrollmentBundle\Repository\PasselEnrollmentRepository');
        
        for ($i = 1, $f = 1, $p = 1, $w = 1, $q = 1, $s = 1; $i <= $this->getFixtureMax('passel_enrollment'); $i++) {
            $enrollment = $this->getRepository()->createNew();
            
            $enrollment->setPassel($this->getReference('Volleyball.Passel-'.$p));
            $enrollment->setFacility($this->getReference('Volleyball.Facility-'.$f));
            $enrollment->setWeek($this->getReference('Volleyball.Week-'.$w));
            $enrollment->setSeason($this->getReference('Volleyball.Season-'.$s));
            $enrollment->setQuarters($this->getReference('Volleyball.Quarters-'.$q));
            $enrollment->isSpecial((0 == $i % 2));
                        
            $this->setReference('Volleyball.PasselEnrollment-'.$i, $enrollment);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            $p = (0 == $i % 2) ? ++$p : $p;
            $w += 2;
            $s++;
            $q += 2;
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
