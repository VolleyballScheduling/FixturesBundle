<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadPasselPositionData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\PositionRepository');
        
        for ($i = 1; $i <= $this->getFixtureMax('attendee_position'); $i++) {
            $position = $this->getRepository()->createNew();
            
            $position->setName($this->faker->name);
            $position->setDescription($this->faker->text);
            $position->setOrganization($this->getReference('Volleyball.Organization-'.(0 == $i % 2 ? 2 : 1)));
            
            $this->setReference('Volleyball.PasselPosition-'.$i, $position);
            
            $manager->persist($position);
            
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
        return 22;
    }
}
