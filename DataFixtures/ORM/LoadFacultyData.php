<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadFacultyData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\FacilityBundle\Repository\FacultyRepository');
        for ($i = 1, $q = 2, $f = 1; $i <= $this->getFixtureMax('faculty'); $i++) {
            $faculty = $this->getRepository()->createNew();

            $faculty->setFirstname($this->faker->firstName);
            $faculty->setLastname($this->faker->lastName);
            $faculty->setEmail($this->faker->email);
            $faculty->setPlainPassword($this->faker->word);
            $faculty->setEnabled(true);
            $faculty->setRoles(array('ROLE_FACILITY_FACULTY'));

            $faculty->setPosition($this->getReference('Volleyball.FacilityPosition-'.$i));
            $faculty->setFacility($this->getReference('Volleyball.Facility-'.$f));
            $faculty->setQuarters($this->getReference('Volleyball.Quarters-'.$q));
            
            // flush every 5 itterations
            if (0 == $i % 5) {
                $manager->flush();
            }
            
            // 2 faculty per facility
            $f = (0 == $i % 2) ? ++$f : $f;
            
            // quarters fixtures are loaded alternating types [passel, faculty, passel, faculty]
            $q += 2;
            
            $this->setReference('Volleyball.Faculty-'.$i, $faculty);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 12;
    }
}
