<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new \Volleyball\Bundle\UserBundle\Entity\User();

        $user->setUsername('admin');
        $user->setFirstName($this->faker->firstName);
        $user->setLastName($this->faker->lastName);
        $user->setEmail('volleyball@daviddurost.net');
        $user->setPassword('v0l1ey8a1l');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setGender('male');
        $user->setBirthdate($this->faker->datetime());

        $manager->persist($user);
        $manager->flush();

        $this->setReference('User-Administrator', $user);

        $populator = new \Faker\ORM\Doctrine\Populator($this->faker, $manager);
        $populator->addEntity('\Volleyball\Bundle\UserBundle\Entity\User', 5);
        $populator->execute();
//        for ($i = 1; $i <= 5; $i++) {
//            $user = new \Volleyball\Bundle\UserBundle\Entity\User();
//
//            $username = $this->faker->username;
//
//            $user->setUsername($username);
//            $user->setFirstName($this->faker->firstName);
//            $user->setLastName($this->faker->lastName);
//            $user->setEmail($username.'@example.com');-
//            $user->setPassword($username);
//            $user->setEnabled($this->faker->boolean);
//            $user->setGender((0 == $i % 2) ? 'male' : 'female');
//            $user->setBirthdate($this->faker->datetime());
//
//            $manager->persist($user);
//
//            $this->setReference('Volleyball.User-'.$i, $user);
//        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
