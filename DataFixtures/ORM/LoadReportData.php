<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadReportData extends DataFixture
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
        return 16;
    }
}
