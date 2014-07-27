<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadAddressData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= $this->getFixtureMax('address'); $i++) {
            $manager->persist($this->createAddress($i));
            
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
        return 4;
    }
    
    public function createAddress($i)
    {
        $address = new \Volleyball\Bundle\UtilityBundle\Entity\Address();
            
        $address->setName($this->faker->name);
        $address->setStreet($this->faker->streetAddress);
        $address->setSuburb($this->faker->secondaryAddress);
        $address->setCity($this->faker->city);
        $address->setZone($this->faker->state);
        $address->setCountry($this->faker->country);
        $address->setPostalCode($this->faker->postcode);
        $address->setLatitude($this->faker->latitude);
        $address->setLongitude($this->faker->longitude);
        
        $this->setReference('Volleyball.Address-'.$i, $address);
        
        return $address;
    }
}
