<?php

namespace Stride\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Stride\Core\Entity\Roles;
use Stride\Core\Entity\Users;

class RestController extends AbstractController
{
   
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $userRepo = $entityManager->getRepository('CoreBundle:Users')->findOneById(2);
        $roleRepo = $entityManager->getRepository('CoreBundle:Roles')->findOneById(1);
        // dump($roleRepo);
        $userRepo->setFirstName("Andrew");
        $userRepo->setLastName("Mathous");
        $userRepo->addRoleId($roleRepo);
        $entityManager->persist($userRepo);
        $entityManager->flush();
        dump($userRepo->getRoleId());die;
        dump(get_class_methods($userRepo));die;
        // $this->createUser();
        // foreach($this->getRoles() as $role) {
        //     $newRole = new Roles;
        //     $newRole->setCode($role['code']);
        //     $newRole->setPermissions($role['permissons']);
        //     $newRole->setCreatedAt($role['created']);
        //     $newRole->setUpdatedAt($role['updated']);
        //     $newRole->setStatus(1);
        //     // $newUser->
        //     $entityManager->persist($newRole);
        //     $entityManager->flush();

        // }
        // $roles = $userRepo->getRoles();
        // dump($roles);
        dump('load Settings');die;
        // return $this->render('default/index.html.twig', [
        //     'controller_name' => 'DefaultController',
        // ]);
    }

    public function createUser() {
        $entityManager = $this->getDoctrine()->getManager();
        
        foreach($this->getUsers() as $user) {
            $newUser = new Users();
            $newUser->setFirstName($user['firstName']);
            $newUser->setLastName($user['lastName']);
            $newUser->setUserName($user['userName']);
            $newUser->setEmail($user['email']);
            $newUser->setPassword($user['password']);
            $newUser->setCreatedAt($user['created']);
            $newUser->setUpdatedAt($user['updated']);
            $newUser->setStatus(1);

            $entityManager->persist($newUser);
            $entityManager->flush();
        };
    }
    public function getRoles()
    {
        $now = new \DateTime();

        return [
                [
                    "code" => "ROLE_ADMIN",
                    "permissons" => ["CREATE_USER", "CREATE_ROLE", "UPDATE_ROLE"],
                    "created" => $now,
                    "updated" => $now,
                ],
                [
                    "code" => "ROLE_SUPER_ADMIN",
                    "permissons" => ["CREATE_USER", "CREATE_ROLE", "UPDATE_ROLE"],
                    "created" => $now,
                    "updated" => $now,
                ],
                [
                    "code" => "ROLE_USER",
                    "permissons" => ["CREATE_USER", "CREATE_ROLE", "UPDATE_ROLE"],
                    "created" => $now,
                    "updated" => $now,
                ]
            ];
    }

    public function getUsers()
    {
        $now = new \DateTime();

        return [
            [
                "firstName" => "John",
                "lastName"  => "Doe",
                "userName"  => "johndoe",
                "email"     => "john@example.com",
                "password"  => "hello000",
                "created"   => $now,
                "updated"   => $now
            ],
            [
                "firstName" => "firoj",
                "lastName"  => "ahmad",
                "userName"  => "firoj09",
                "email"     => "firoj@example.com",
                "password"  => "firoj",
                "created"   => $now,
                "updated"   => $now
            ]
        ];
    }
}
