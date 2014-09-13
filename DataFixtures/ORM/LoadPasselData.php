<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadPasselData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\EnrollmentBundle\Repository\PasselRepository');
        
        for ($i = 1, $c = 1, $r = 1, $o = 1; $i <= $this->getFixtureMax('passel'); $i++) {
            $passel = $this->getRepository()->createNew();
            
            $passel->setName($this->faker->name);
            $passel->setCouncil($this->getReference('Volleyball.Council-'.$c));
            $passel->setRegion($this->getReference('Volleyball.Region-'.$r));
            $passel->setType($this->getReference('Volleyball.PasselType-'.$o));
            $passel->setOrganization($this->getReference('Volleyball.Organization-'.$o));
            
            $r = (0 == $i % 2) ? ++$r : $r;
            $c = (0 == $i % 4) ? ++$c : $c;
            $o = (0 == $i % 8) ? ++$o : $o;
            
            $this->setReference('Volleyball.Passel-'.$i, $passel);
            
            // flush ev/src/ery 5 itterations
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
        return 18;
    }
}
