<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadLeaderData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\LeaderRepository');
        for ($i = 1, $p = 1; $i <= $this->getFixtureMax('leader'); $i++) {
            $leader = $this->getRepository()->createNew();

            $leader->setFirstname($this->faker->firstName);
            $leader->setLastname($this->faker->lastName);
            $leader->setEmail($this->faker->email);
            $leader->setPlainPassword($this->faker->word);
            $leader->setEnabled(true);
            $leader->setRoles(array('ROLE_PASSEL_LEADER'));
            $leader->setPassel($this->getReference('Volleyball.Passel-'.$p));
            $leader->isAdmin((0 == $i % 2 ? 1 : 0));
            $leader->isPrimary((0 == $i % 2 ? 1 : 0));
                        
            $this->setReference('Volleyball.Leader-'.$i, $leader);
        
            $p = (0 == $i % 2) ? ++$p : $p;
            
            $manager->persist($leader);
            
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
        return 19;
    }
}
