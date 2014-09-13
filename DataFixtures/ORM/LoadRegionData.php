<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadRegionData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1, $o = 1, $c = 1; $i <= $this->getFixtureMax('region'); $i++) {
            $region = new \Volleyball\Bundle\OrganizationBundle\Entity\Region();
            
            $region->setName($this->faker->name);
            $region->setDescription($this->faker->paragraph);
            
            $region->setCouncil($this->getReference('Volleyball.Council-'.$c));
            $region->setOrganization($this->getReference('Volleyball.Organization-'.$o));
            
            $this->setReference('Volleyball.Region-'.$i, $region);
            
            $manager->persist($region);
            
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            if ($c % 2) { // 2 regions per council
                $c++;
            } elseif ($c  === $this->getFixtureMax('council')) { // wrap loading
                $c = 1;
            }
            
            if (0 == $i % 4) { // 4 regions per organization
                $o++;
            } elseif ($o === $this->getFixtureMax('organization')) { // wrap loading
                $o = 1;
            }
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 7;
    }
}
