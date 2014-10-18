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
        $half = $this->getFixtureMax('leader') / 2; // 2 per passel, but 1 is admin and one is normal
        $populator = new \Faker\ORM\Doctrine\Populator($this->faker, $manager);
        // Passel leader
        $populator->addEntity(
            '\Volleyball\Bundle\PasselBundle\Entity\Leader',
            $half,
            array(
                'roles' => 'ROLE_PASSEL_LEADER'
            )
        );
        // Passel admin
        $populator->addEntity(
            '\Volleyball\Bundle\PasselBundle\Entity\Leader',
            $half,
            array(
                'roles' => 'ROLE_PASSEL_ADMIN',
                //'admin' => true,
                //'primary' => true
            )
        );
        
        $populator->execute();
        
        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 16;
    }
}
