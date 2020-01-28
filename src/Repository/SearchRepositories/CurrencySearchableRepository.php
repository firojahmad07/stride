<?php
namespace App\Repository\SearchRepositories;

use App\Components\Repository\SearchableRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * currency searchable repository impletes SearchableRepositoryInterface
 * 
 * @author Firoj Ahmad <firojahmad07@gmail.com>
 */

class CurrencySearchableRepository implements SearchableRepositoryInterface
{
    private $entityManager;
    private $entityName;

    public function __construct(EntityManagerInterface $entityManager, 
    $entityName)
    {
        $this->entityManager    = $entityManager;
        $this->entityName       = $entityName;
    }

    public function findBySearch($search = null, $options = [])
    {

    }
}