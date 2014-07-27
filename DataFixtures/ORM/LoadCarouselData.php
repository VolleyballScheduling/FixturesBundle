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
        $this->setRepository('Volleyball\Bundle\UtilityBundle\Repository\CarouselRepository');
        $splash = new \Volleyball\Bundle\UtilityBundle\Entity\Carousel();
        
        $splash->setName('splash');
        for ($i = 1; $i <= 3; $i++) {
            $splash->addItem($this->getReference('Volleyball.Carousel.Item-'.$i));
        }
        $manager->persist($splash);
        
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
