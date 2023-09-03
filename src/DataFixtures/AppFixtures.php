<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\CommentFactory;
use App\Factory\PostFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);
    UserFactory::createOne([
      'name' => 'admin',
      'email' => 'admin@admin.com',
      'roles' => ['ROLE_ADMIN'],
      'password' => 'adminadmin',
    ]);
    UserFactory::createMany(10);
    CategoryFactory::createMany(10);
    PostFactory::createMany(50);
    CommentFactory::createMany(100);

    $manager->flush();
  }
}
