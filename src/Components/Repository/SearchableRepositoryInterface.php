<?php
namespace App\Components\Repository;

interface SearchableRepositoryInterface
{
    const LIMIT = 15;

    public function findBySearch($search = null, array $options = []);
}