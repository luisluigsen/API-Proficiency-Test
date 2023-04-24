<?php

namespace User\Adapter\Database\ORM\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use User\Domain\Exception\InvalidArgumentException;
use User\Domain\Exception\ResourceNotFoundException;
use User\Domain\Model\User;
use User\Domain\Repository\UserRepository;

class DoctrineUserRepository implements UserRepository
{

    private readonly ServiceEntityRepository $repository;
    private readonly ObjectManager|EntityManagerInterface $manager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->repository = new ServiceEntityRepository($registry, User::class);
        $this->manager = $registry->getManagerForClass(User::class);
    }

    public function findOneByIdOrFail(string $id): User
    {
        if (null === $user = $this->repository->find($id)){
            throw ResourceNotFoundException::createFromClassAndId(User::class, $id);
        }

        return $user;
    }

    public function search(array $filters): array
    {
        $queryBuilder = $this->repository->createQueryBuilder('u');

        foreach ($filters as $field => $filter) {
            foreach ($filter as $operator => $value) {
                switch ($operator) {
                    case 'eq':
                        if (is_array($value)) {
                            $queryBuilder->andWhere("u.$field IN (:$field)")
                                ->setParameter($field, $value);
                        } else {
                            $queryBuilder->andWhere("u.$field = :$field")
                                ->setParameter($field, $value);
                        }
                        break;
                    case 'neq':
                        if (is_array($value)) {
                            $queryBuilder->andWhere("u.$field NOT IN (:$field)")
                                ->setParameter($field, $value);
                        } else {
                            $queryBuilder->andWhere("u.$field != :$field")
                                ->setParameter($field, $value);
                        }
                        break;
                    case 'gt':
                        $queryBuilder->andWhere("u.$field > :$field")
                            ->setParameter($field, $value);
                        break;
                    case 'lt':
                        $queryBuilder->andWhere("u.$field < :$field")
                            ->setParameter($field, $value);
                        break;
                    default:
                        throw new InvalidArgumentException("Invalid operator: $operator");
                }
            }
        }

        return $queryBuilder->getQuery()->getResult();
    }

    public function save(User $user): void
    {
        $this->manager->persist($user);
        $this->manager->flush();
    }

    public function remove(User $user): void
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }
}