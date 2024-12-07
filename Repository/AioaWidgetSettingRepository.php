<?php
// src/Repository/AioaWidgetSettingRepository.php

namespace Skynettechnologies\AllinOneAccessibilityBundle\Repository;

use Skynettechnologies\AllinOneAccessibilityBundle\Entity\AioaWidgetSetting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AioaWidgetSettingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AioaWidgetSetting::class);
    }
}
