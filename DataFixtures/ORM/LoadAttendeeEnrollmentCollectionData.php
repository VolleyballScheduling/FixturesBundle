<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use \Doctrine\Common\Persistence\ObjectManager;

class LoadAttendeeEnrollmentCollectionData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {

    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 29;
    }
}
