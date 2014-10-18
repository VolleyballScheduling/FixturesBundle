<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadQuartersData extends DataFixture
{
    /**
     * {@inheritdoc} 
     */
    public function load(ObjectManager $manager)
    {
        $populator = new \Faker\ORM\Doctrine\Populator($this->faker, $manager);
        $populator->addEntity(
            '\Volleyball\Bundle\FacilityBundle\Entity\Quarters',
            $this->getFixtureMax('quarters'),
            array(
                'capacity' => 10,
                'type' => $this->faker->boolean ? 'passel' : 'faculty'
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
        return 10;
    }
}
