<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCarouselData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $splash = $this->getCarouselRepository()->createNew();
        
        $splash->setName('splash');
        for ($i = 1; $i <= 3; $i++) {
            $this->addItem($this->getReference('Volleyball.Carousel.Item-'.$i));
        }
        
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 3;
    }
}
