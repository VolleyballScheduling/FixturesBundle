<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadFactionData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\FactionRepository');
        
        for ($i = 1, $p = 1; $i <= $this->getFixtureMax('faction'); $i++) {
            $faction = $this->getRepository()->createNew();
            
            $faction->setName($this->faker->name);
            $faction->setAvatar($this->faker->image('/bundles/passel/img/passel/avatar'));
            $faction->setPassel($this->getReference('Volleyball.Passel-'.$p));
            
            $this->setReference('Volleyball.Faction-'.$i, $faction);
            
            $p = (0 == $i % 2) ? ++$p : $p;
            
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
        return 20;
    }
}
