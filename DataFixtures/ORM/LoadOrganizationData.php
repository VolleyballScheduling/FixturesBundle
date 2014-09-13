<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadOrganizationData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= $this->getFixtureMax('organization'); $i++) {
            $org = new \Volleyball\Bundle\OrganizationBundle\Entity\Organization();
            
            $org->setName($this->faker->name);
            $org->setDescription($this->faker->paragraph);
            
            $this->setReference('Volleyball.Organization-'.$i, $org);
            
            $manager->persist($org);
            
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
