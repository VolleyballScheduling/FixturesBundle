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
        for ($i = 1, $o = 1; $i <= 200; $i++) {
            $region = $this->getRegionRepository()->createNew();
            
            $region->setName($this->faker->name);
            $region->setDescription($this->faker->paragraph);
            
            if (0 == $i % 4) {
                $o++;
            }
            
            $region->setOrganization($this->getReference('Volleyball.Organization-'.$o));
            
            $this->setReference('Volleyball.Region-'.$i, $region);
            
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
        return 7;
    }
}
