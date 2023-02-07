<?php

declare(strict_types = 1);

namespace OxidAcademy\ProductDataReader;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;

class DataReaderService
{
    public function __construct(private QueryBuilderFactoryInterface $queryBuilderFactory) {}

    public function readDataByItemNumber(string $itemNumber): array
    {
        $queryBuilder = $this->queryBuilderFactory->create();
        $product = oxNew(Article::class);

        $queryBuilder
            ->select('OXID')
            ->from($product->getViewName())
            ->where($product->getSqlActiveSnippet())
            ->andWhere('OXARTNUM = :itemNumber')
            ->setParameter('itemNumber', $itemNumber);
        $result = $queryBuilder->execute()->fetchAssociative();

        if (isset($result['OXID'])) {
            $product->load($result['OXID']);
        
            return [
                'match' => true,
                'title' => $product->getFieldData('oxtitle'),
                'price' => $product->getPrice()->getPrice(),
                'url' => $product->getLink($product->getLanguage()),
            ];
        } else {
            return [
                'match' => false,
            ];
        }
    }
}
