<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadPasselEnrollmentData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $populator = new \Faker\ORM\Doctrine\Populator($this->faker, $manager);
        $populator->addEntity(
            '\Volleyball\Bundle\EnrollmentBundle\Entity\PasselEnrollment',
            $this->getFixtureMax('passel_enrollment')
        );
        
        $populator->execute();
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 27;
    }
}
