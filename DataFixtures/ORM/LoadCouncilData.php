<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCouncilData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= $this->getFixtureMax('council'); $i++) {
            $council = new \Volleyball\Bundle\OrganizationBundle\Entity\Council();
            
            $council->setName($this->faker->name);
            $council->setDescription($this->faker->paragraph);
            $council->setOrganization($this->getReference('Volleyball.Organization-'.(0 == $i % 2 ? 2 : 1)));
            
            $this->setReference('Volleyball.Council-'.$i, $council);
            
            $manager->persist($council);
            
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
        return 6;
    }
}
