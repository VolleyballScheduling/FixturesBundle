<?php
namespace Volleyball\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadOrganizationData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $org = $this->getOrganizationRepository()->createNew();
            
            $org->setName($this->faker->name);
            $org->setDescription($this->faker->paragraph);
            
            $this->setReference('Volleyball.Organization-'.$i, $org);
            
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
        return 5;
    }
}
