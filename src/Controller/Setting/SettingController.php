<?php
namespace App\Controller\Setting;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Components\Repository\SearchableRepositoryInterface;
use App\Entity\Currency;
use App\Entity\Locale;
use App\Entity\AttributeGroups;
use Symfony\Component\HttpFoundation\JsonResponse;

class SettingController extends AbstractController
{
    public $entityManager;
    public $currencySearchable;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager        = $entityManager;
        // $this->currencySearchable   = $currencySearchable;
    }

    public function getCurrencies(Request $request)
    {
       
        if($optionParams = json_decode($request->get('options'), true)) {
            $limit  = $optionParams['limit'];
            $page   = $optionParams['page'];
            $offset = ($page-1) * $limit;
            $currencyRepo = $this->entityManager->getRepository(Currency::class);
            $currencyQB   = $currencyRepo->createQueryBuilder('c')
                            ->select('c.id, c.code as code, c.countryName, c.status')
                            ->setMaxResults($limit)
                            ->setFirstResult($offset);
            $currencyResult = $currencyQB->getQuery()->getResult();
            // $allResult = $currencyRepo->createQueryBuilder('c')->select('count(c.id) as last');
            // $result = $allResult->getQuery()->getResult();
            // $responseData['data'] = $currencyResult;
            // $responseData['pagination'] = [
            //     'first' => 1,
            //     'last'  => $result[0]['last'],
            //     'page'  => $page,
            //     'data'  => $this->generatePagination($page)
            // ];

            return new JsonResponse($currencyResult);
        }
        
    }
    public function getLocales(Request $request)
    {
        if($optionParams = json_decode($request->get('options'), true)) {
            $limit  = $optionParams['limit'];
            $page   = $optionParams['page'];
            $offset = ($page-1) * $limit;
            $currencyRepo = $this->entityManager->getRepository(Locale::class);
            $currencyQB   = $currencyRepo->createQueryBuilder('l')
                            ->select('l.id, l.code, l.status')
                            ->setMaxResults($limit)
                            ->setFirstResult($offset);
            $currencyResult = $currencyQB->getQuery()->getResult();

            return new JsonResponse($currencyResult);

        }
    }
    public function createAttributeGroup(Request $request)
    {
        $requestParams = json_decode($request->getContent(), true);
        if (!empty($requestParams)) {
            
            $attributeGroupRepo = $this->entityManager->getRepository(AttributeGroups::class)->findOneByCode($requestParams['code']); 
            
            if(!empty($attributeGroupRepo) && !isset($requestParams['id'])) {
                $result['metaId'] =   $attributeGroupRepo->getId();
                $result['code'] =   303;
                return new JsonResponse($result);
            }
            $now = new \DateTime();
            
            $attributeGroup = !empty($attributeGroupRepo) ? $attributeGroupRepo : new AttributeGroups;

            $attributeGroup->setCode($requestParams['code']);
            $attributeGroup->setLabel($requestParams);
            $attributeGroup->setCreatedAt($now);
            $attributeGroup->setUpdatedAt($now);

            $this->entityManager->persist($attributeGroup);
            $this->entityManager->flush();

            $requestParams['id'] = $attributeGroup->getId();

            return new JsonResponse($requestParams);

        }
    }
    public function getAttributeGroups(Request $request)
    {
        $attributeGroupResult = [];
        if($optionParams = json_decode($request->get('options'), true)) {
            $limit  = $optionParams['limit'];
            $page   = $optionParams['page'];
            $offset = ($page-1) * $limit;

            $currencyRepo = $this->entityManager->getRepository(AttributeGroups::class);
            $currencyQB   = $currencyRepo->createQueryBuilder('a')
                            ->select('a.id, a.code, a.label as extra')
                            ->setMaxResults($limit)
                            ->setFirstResult($offset);

            $attributeGroupResult = $currencyQB->getQuery()->getResult();

        }
        $attributeGroupResult = $this->formateAttributeGroup($attributeGroupResult);
        return new JsonResponse($attributeGroupResult);
    }
    public function getAttributeGroup(Request $request)
    {
        $attributeGroupId = $request->get('attributeGroupCode');
        $attributeGroupRepo   = $this->entityManager->getRepository(AttributeGroups::class);
        $attributeGroupResult = $attributeGroupRepo->findOneByCode($attributeGroupId);
        
        $responseData = [
            "id" => $attributeGroupResult->getId(),
            "code" => $attributeGroupResult->getCode(),
            "label" => $attributeGroupResult->getLabel()['label'],
        ];

        return new JsonResponse($responseData);
        // $currencyResult = $currencyQB->getQuery()->getResult();
    }
    
    public function formateAttributeGroup($attrGroups)
    {
        $data = [];

        if(!empty($attrGroups)) {
            foreach($attrGroups as $attrGroup) {
                $data[] = [
                    'code' => $attrGroup['code'],
                    'label' => $attrGroup['extra']['label'],
                ];
            }
        }

        return $data;
    }
    // public function generatePagination($page)
    // {
    //     $data = [];
    //     for($i = $page; $i< (5+$page); $i++) {
    //         $data[] = $i;
    //     }
    //     dump($data);die;
    //     return $data;
    // }
}
?>