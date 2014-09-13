<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadDepartmentData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1, $f = 1; $i <= $this->getFixtureMax('department'); $i++) {
            $department = new \Volleyball\Bundle\FacilityBundle\Entity\Department();
            
            $department->setName($this->faker->name);
            $department->setFacility($this->getReference('Volleyball.Facility-'.$f));
            
            $this->setReference('Volleyball.Department-'.$i, $department);
            
            $manager->persist($department);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            $f = (0 == $i % 2 ? ++$f : $f);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 9;
    }
}
