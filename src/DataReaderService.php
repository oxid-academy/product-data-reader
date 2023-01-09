<?php

declare(strict_types = 1);

namespace OxidAcademy\ProductDataReader;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

class DataReaderService
{
    public function __construct(QueryBuilderFactoryInterface $queryBuilderFactory)
    {
        $this->queryBuilderFactory = $queryBuilderFactory;
    }

    public function readDataByItemNumber(int $itemNumber): array
    {
        $product = oxNew(Article::class);
        $tableName = $product->getViewName();

        $queryBuilder = $this->queryBuilderFactory->create();
        $queryBuilder
            ->select('OXID')
            ->from($tableName)
            ->where('OXARTNUM = :itemNumber')
            ->andWhere($product->getSqlActiveSnippet())
            ->setParameter('itemNumber', $itemNumber);
        $result = $queryBuilder->execute()->fetchAssociative();

        if (isset($result['OXID'])) {
            $product->load($result['OXID']);
        
            return [
                'match' => true,
                'title' => $product->getFieldData('OXTITLE'),
                'price' => $product->getPrice()->getPrice(),
            ];
        } else {
            return [
                'match' => false,
            ];
        }
    }
}
