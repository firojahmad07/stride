<?php

namespace Stride\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
// use Stride\Core\Entity\Roles;
// use Stride\Core\Entity\Users;

class UserController extends AbstractController
{
    public function getUser()
    {
        $users = [
            [
                "id" => 1,
                "firstName" => "demo firstName",
                "lastName" => "demo lastName",
                "email" => "email",
            ], [
                "id" => 2,
                "firstName" => "demo firstName",
                "lastName" => "demo lastName",
                "email" => "email",
            ], [
                "id" => 3,
                "firstName" => "demo firstName",
                "lastName" => "demo lastName",
                "email" => "email",
            ], [
                "id" => 4,
                "firstName" => "demo firstName",
                "lastName" => "demo lastName",
                "email" => "email",
            ],
            [
                "id" => 5,
                "firstName" => "demo firstName",
                "lastName" => "demo lastName",
                "email" => "email",
            ],
            ];

            return new JsonResponse($users);
    }
}