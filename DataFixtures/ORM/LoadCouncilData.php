<?php
namespace Volleyball\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCouncilData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1, $o = 1; $i <= 50; $i++) {
            $council = $this->getCouncilRepository()->createNew();
            
            $council->setName($this->faker->name);
            $council->setDescription($this->faker->paragraph);
            
            if (0 == $i % 5) {
                $o++;
            }
            
            $council->setOrganization($this->getReference('Volleyball.Organization-'.$o));
            
            $this->setReference('Volleyball.Council-'.$i, $council);
            
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
