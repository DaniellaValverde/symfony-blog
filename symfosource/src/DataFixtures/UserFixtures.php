<?php

namespace DataFixtures;

use CA\BlogBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
    $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        //// user admin
        $random = random_int(1, 1999);
        $user_adm = new User();
        $user_adm->setSalt($random);
        $user_adm->setUsername('admin');
        $user_adm->setPlainPassword('admin');
        $password = $this->encoder->encodePassword($user_adm, $user_adm->getPlainPassword());
        $user_adm->setPassword($password);
        $user_adm->setRoles(array('ROLE_ADMIN'));
        $user_adm->setMail('admin@admin.com');
        $manager->persist($user_adm);

        $manager->flush();
    }
}
?>