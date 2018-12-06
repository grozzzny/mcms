<?php


namespace common\models;

/**
 * Interface CatalogInterface
 * @package common\models
 *
 * @property-read string $mainCategorySlug
 */
interface CatalogInterface
{
    public function getMainCategorySlug();
}