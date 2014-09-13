<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadFacilityData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1, $c = 1; $i <= $this->getFixtureMax('facility'); $i++) {
            $facility = new \Volleyball\Bundle\FacilityBundle\Entity\Facility();
            
            $facility->setName($this->faker->name);
            $facility->setAddress($this->getReference('Volleyball.Address-'.$i));
            $facility->setOrganization($this->getReference('Volleyball.Organization-'.(0 == $i % 4 ? 2 : 1)));
            $facility->setCouncil($this->getReference('Volleyball.Council-'.$c));
            $facility->setRegion($this->getReference('Volleyball.Region-'.$i));
            
            $c = (0 == $i % 2 ? ++$c : $c);

            $this->setReference('Volleyball.Facility-'.$i, $facility);
            
            $manager->persist($facility);
            
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
        return 8;
    }
}
