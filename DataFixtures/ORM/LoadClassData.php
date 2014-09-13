<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadClassData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\CourseBundle\Repository\VbClassRepository');
        
        for ($i = 1, $d = 1, $c = 1, $f = 1; $i <= $this->getFixtureMax('class'); $i++) {
            $class = $this->getRepository()->createNew();
            
            $class->setName($this->faker->name);
            $class->setDepartment($this->getReference('Volleyball.Department-'.$d));
            $class->setFacilityCourse($this->getReference('Volleyball.FacilityCourse-'.$c));
            $class->setFaculty($this->getReference('Volleyball.Faculty-'.$f));
            $class->setCapacity(10);
            $class->isEnabled((0 == $i % 2));
            
            $this->setReference('Volleyball.Class-'.$i, $class);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            $c += 2;
            $d += 2;
            $f++;
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 26;
    }
}
