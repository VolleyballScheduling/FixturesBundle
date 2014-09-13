<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadFacilityCourseData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\EnrollmentBundle\Repository\FacilityCourseRepository');
        
        for ($i = 1, $f = 1, $c = 1, $s = 1; $i <= $this->getFixtureMax('facility_course'); $i++) {
            $facility_course = $this->getRepository()->createNew();
            
            $facility_course->setCourse($this->getReference('Volleyball.Course-'.$c));
            $facility_course->setFacility($this->getReference('Volleyball.Facility-'.$f));
            $facility_course->setSeason($this->getReference('Volleyball.Season-'.$s));
            
            $this->setReference('Volleyball.FacilityCourse-'.$i, $facility_course);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }

            $s = (0 == $i % 2) ? ++$s : $s;
            $f = (0 == $i % 4) ? ++$f : $f;
            $c = (0 == $i % 4) ? ++$c : $c;
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 25;
    }
}
