<?php
namespace App\Components\Repository;

/**
 * Searchable repository interface
 * @author    Firoj Ahmad <firojahmad07@gmail.com> 
 */
interface SearchableRepositoryInterface
{
    const LIMIT = 15;
    /**
     * It will return array of entity values
     * @return array
     */
    public function findBySearch($search = null, array $options = []);
}