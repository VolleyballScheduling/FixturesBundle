<?php
namespace Volleyball\Bundle\FixturesBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

class LoadRequirementData extends DataFixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->setRepository('Volleyball\Bundle\CourseBundle\Repository\RequirementRepository');
        
        for ($i = 1, $x = 1, $c = 1; $i <= $this->getFixtureMax('requirement'); $i++) {
            $requirement = $this->getRepository()->createNew();
            
            $requirement->setName($this->faker->name);
            $requirement->setDescription($this->faker->text);
            $requirement->setCourse($this->getReference('Volleyball.Course-'.$c));
            
            // birth children
            if (3 <= $x && $i != $x) {
                $requirement->setParent($this->getReference('Volleyball-Requirement-'.($i-1)));
                $x++;
            }
            
            // make the children optional (for testing purposes)
            if ('' != $requirement->getParent()) {
                $requirement->isOption(true);
            }
            
            $this->setReference('Volleyball.Requirement-'.$i, $requirement);
            
            $manager->persist($requirement);
            
            // flush every 5 itterations
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
        return 24;
    }
}
