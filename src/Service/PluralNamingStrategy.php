<?php
namespace App\Service;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;

class PluralNamingStrategy extends UnderscoreNamingStrategy
{
    /**
     * {@inheritdoc}
     */
    public function classToTableName($className)
    {
        return Inflector::pluralize($className);
//        return parent::classToTableName($className);
    }

}