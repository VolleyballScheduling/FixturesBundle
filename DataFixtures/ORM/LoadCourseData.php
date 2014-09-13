<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCourseData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\CourseBundle\Repository\CourseRepository');
        
        for ($i = 1, $o = 1, $c = 1, $r = 1; $i <= 4; $i++) {
            $course = $this->getRepository()->createNew();
            
            $course->setName($this->faker->name);
            $course->setDescription($this->faker->text);
            $course->setOrganization($this->getReference('Volleyball.Organization-'.(0 == $i % 4 ? 2 : 1)));
            $course->setCouncil(null); // $this->getReference('Volleyball.Council-'.$c));
            $course->setRegion(null); // $this->getReference('Volleyball.Region-'.$r));
            
            $this->setReference('Volleyball.Course-'.$i, $course);
            
            $manager->persist($course);
            
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
        return 24;
    }
}
