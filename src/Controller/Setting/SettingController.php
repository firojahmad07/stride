<?php
namespace App\Controller\Setting;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class SettingController extends AbstractController
{
    public $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getCurrencies(Request $request)
    {
        dump("ddd", $request->get('options'));
        dump('hey in controller');die;
    }
}
?>