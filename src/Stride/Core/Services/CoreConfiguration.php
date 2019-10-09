<?php

namespace Stride\Core\Services;

class CoreConfiguration
{
    public $entityManager;
    public $containerService;

    public function __construct($entityManager, $containerService)
    {
        $this->entityManager    = $entityManager;
        $this->containerService = $containerService;
    }

    public function getMessage()
    {
        return "hey you are in coreCofiguration";
    }
}