<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCarouselItemData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 3; $i++) {
            $manager->persist($this->createItem());
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 2;
    }
    
    public function createItem($i = 1)
    {
        $item = new \Volleyball\Bundle\UtilityBundle\Entity\CarouselItem();
        
        $item->setName('item "%s"', $this->faker->word);
        $item->setCaption($this->faker->sentence);
        $item->setImage($this->faker->image('/tmp', 640, 480));
        
        $this->setReference('Volleyball.Carousel.Item-'.$i, $item);
        
     
        return $item;
    }
}
