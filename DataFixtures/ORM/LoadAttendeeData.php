<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadAttendeeData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\PasselBundle\Repository\AttendeeRepository');
        
        for ($i = 1, $f = 1, $p = 1, $pp = 1; $i <= 80; $i++) {
            $attendee = $this->getRepository()->createNew();

            $attendee->setFirstname($this->faker->firstName);
            $attendee->setLastname($this->faker->lastName);
            $attendee->setEmail($this->faker->email);
            $attendee->setPlainPassword($this->faker->word);
            $attendee->setEnabled(true);
            $attendee->setRoles(array('ROLE_PASSEL_ATTENDEE'));

            $attendee->setPassel($this->getReference('Volleyball.Passel-'.$p));
            $attendee->setFaction($this->getReference('Volleyball.Faction-'.$f));
            $attendee->setPosition($this->getReference('Volleyball.PasselPosition-'.$pp));
            $attendee->setLevel($this->getReference('Volleyball.Level-1'));
            
            $this->setReference('Volleyball.Attendee-'.$i, $attendee);
            
            $manager->persist($attendee);
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            $p = (0 == $i % 4) ? ++$p : $p;
            $f = (0 == $i % 2) ? ++$f : $f;
            $pp = (0 == $i % 2 ? (0 == $i % 4 ? ++$pp : 1) : ++$pp);
            $l = (0 == $i % 2 ? (0 == $i % 4 ? ++$l : 1) : ++$l);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 23;
    }
}
