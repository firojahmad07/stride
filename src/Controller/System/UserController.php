<?php
namespace App\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User\User;
use App\Entity\User\Role;

class UserController extends AbstractController
{
    protected $entityManager;
    protected $encoder;

    public function __construct(EntityManagerInterface $entityManager,
    UserPasswordEncoderInterface $encoder)
    {
        $this->entityManager = $entityManager;
        $this->encoder        = $encoder;
    }
    public function getDefaultUserRole()
    {
       return $this->entityManager->getRepository(Role::class)->findOneByCode('ROLE_ADMIN');
    }
    public function addUser(Request $request)
    {
        $userRepo = $this->entityManager->getRepository(User::class);
        $params = json_decode($request->getContent(), true);
        
        try {
            $now = new \DateTime();
            $userEntity = $userRepo->findOneByUsername($params['userName']);
            if (empty($userEntity)) {
                $userEntity = new User;
                $userEntity->setCreatedAt($now);
            }
            $password = $this->encoder->encodePassword($userEntity, $params['password']);
            $userEntity->setFirstName($params['firstName']);
            $userEntity->setLastName($params['lastName']);
            $userEntity->setEmail($params['email']);
            $userEntity->setUserName($params['userName']);
            $userEntity->setUpdatedAt($now);
            $userEntity->setPassword($password);
            $userEntity->addRole($this->getDefaultUserRole());
    
            $this->entityManager->persist($userEntity);
            $this->entityManager->flush();

            $result['userId'] = $userEntity->getId();
        } catch (\Exception $e) {
            $result[] = $e->getMessage();
        }

        return new JsonResponse($result);
    }

    public function getUsers()
    {
        $userRepo = $this->entityManager->getRepository(User::class);
        $userRepoQB = $userRepo->createQueryBuilder('u')
                                ->select('u.id, u.firstName, u.lastName, u.username, u.email, u.status');

        $userResult = $userRepoQB->getQuery()->getResult();

        return new JsonResponse($userResult);
    }
}