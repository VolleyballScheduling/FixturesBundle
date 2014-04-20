<?php
namespace Volleyball\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadCarouselItemData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $manager->persist($this->createItem($i));
            
            if (0 == $i % 5) {
                $manager->flush();
            }
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
    
    public function createItem($i)
    {
        $item = $this->getCarouselItemRepository()->createNew();
        
        $item->setName('item "%s"', $this->faker->word));
        $item->setDescription($this->faker->paragraph);
        $item->setCaption($this->faker->sentence);
        $item->setImage($this->>faker->image);
        
        $this->>setReference('Volleyball.Carousel.Item-'.$i, $item);
        
        return $item;
    }
}
