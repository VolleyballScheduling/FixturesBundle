<?php
namespace Volleyball\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadUsersData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = $this->getUserRepository()->createNew();

        $user->setFirstname($this->faker->firstName);
        $user->setLastname($this->faker->lastName);
        $user->setEmail('volleyball@daviddurost.net');
        $user->setPlainPassword('v0l1ey8a1l');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));

        $manager->persist($user);
        $manager->flush();

        $this->setReference('User-Administrator', $user);

        for ($i = 1; $i <= 5; $i++) {
            $user = $this->getUserRepository()->createNew();

            $username = $this->faker->username;

            $user->setFirstname($this->faker->firstName);
            $user->setLastname($this->faker->lastName);
            $user->setEmail($username.'@example.com');
            $user->setPlainPassword($username);
            $user->setEnabled($this->faker->boolean());

            $manager->persist($user);

            $this->setReference('Volleyball.User-'.$i, $user);
        }

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