<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadFacilityPositionData extends DataFixture
{
    /**
     * {@inheritdoc} 
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\FacilityBundle\Repository\PositionRepository');

        for ($i = 1, $f = 1; $i <= $this->getFixtureMax('faculty_position'); $i++) {
            $position = $this->getRepository()->createNew();
            
            $position->setName($this->faker->name);
            $position->setFacility($this->getReference('Volleyball.Facility-'.$f));
            $position->setDescription($this->faker->text);

            $this->setReference('Volleyball.Position-'.$i, $position);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            // 2 positions per facility
            $f = (0 == $i % 2 ? ++$f : $f);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 11;
    }
}
