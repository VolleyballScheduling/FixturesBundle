<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadPasselTypeData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\TypeRepository');
        
        for ($i = 1, $o = 1; $i <= $this->getFixtureMax('passel_type'); $i++) {
            $type = $this->getRepository()->createNew();
            
            $type->setName($this->faker->name);
            $type->setDescription($this->faker->text);
            $type->setOrganization($this->getReference('Volleyball.Organization-'.$o));
            
            $this->setReference('Volleyball.PasselType-'.$i, $type);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            if (0 == $i % 1) { // 2 types
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
        return 17;
    }
}
