<?php

namespace App\DataFixtures;

use Customer\Domain\Model\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;


class AppFixtures extends Fixture
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $uuid = Uuid::v4();

            $customer = Customer::create(
                $uuid->toRfc4122(),
                'Customer ' . chr(64 + $i),
                'customer' . $i . '@example.com',
                ['ROLE_ADMIN']
            );

            $customer->setPassword('password' . $i);

            $manager->persist($customer);
        }

        $manager->flush();
    }
}
