<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User\Role;
use App\Entity\User\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class installFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $entityManager)
    {
        $date = new \DateTime();
        foreach($this->getRoles() as $role) {
            $newRole = new Role;
            $newRole->setCode($role['code']);
            $newRole->setName($role['name']);
            $newRole->setPermissions($role['permissions']);
            $newRole->setStatus(true);
            $newRole->setCreatedAt($date);
            $newRole->setUpdatedAt($date); 
            
            $entityManager->persist($newRole);
            $entityManager->flush();
        }

        $userRole = $entityManager->getRepository(Role::class)->findOneByCode(['code' => 'ROLE_ADMIN']);

        foreach($this->getUsers() as $userData) {
            $newUser = new User;
            $password = $this->encoder->encodePassword($newUser, $userData['password']);
            $newUser->setFirstName($userData['firstName'])
                    ->setLastName($userData['lastName'])
                    ->setUserName($userData['username'])
                    ->setPassword($password)
                    ->setEmail($userData['email'])
                    ->setStatus(true)
                    ->setCreatedAt($date)
                    ->addRole($userRole)
                    ->setUpdatedAt($date);

            $entityManager->persist($newUser);
            $entityManager->flush();
        }
    }
    public function getUsers()
    {
        return [
            [
                "firstName" => "John",
                "lastName"  => "Doe",
                "username"  => "admin",
                "password"  => "admin",
                "email"     => "johndoe@demo.com"
            ]
        ];
    }

    public function getRoles()
    {
        $permissions = ['CREATE_USER', 'CREATE_PRODUCT','DELETE_PRODUCT'];
        return [
            [
                "code" => "ROLE_ADMIN",
                "name" => "Administrator",
                "permissions" => $permissions
            ], [
                "code" => "ROLE_SUPER_ADMIN",
                "name" => "Super Admin",
                "permissions" => $permissions
            ],
        ];
    }

}
