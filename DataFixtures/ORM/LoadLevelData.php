<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadLevelData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\LevelRepository');
        
        for ($i = 1; $i <= $this->getFixtureMax('level'); $i++) {
            $level = $this->getRepository()->createNew();
            
            $level->setName($this->faker->name);
            $level->setDescription($this->faker->text);
            $level->setOrganization($this->getReference('Volleyball.Organization-'.(0 == $i % 2 ? 2 : 1)));
                       
            if (1 == $i) {
                $level->isSpecial(true);
            }
           
            $this->setReference('Volleyball.Level-'.$i, $level);
            
            $manager->persist($level);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 21;
    }
}
