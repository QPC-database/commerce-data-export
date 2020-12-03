<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\CatalogPriceDataExporter\Model\Indexer;

use Magento\CatalogPriceDataExporter\Model\EventPool;
use Magento\Framework\Indexer\ActionInterface as IndexerActionInterface;
use Magento\Framework\Mview\ActionInterface as MviewActionInterface;
use Psr\Log\LoggerInterface;

class ProductPricesFeedIndexer implements IndexerActionInterface, MviewActionInterface
{
    /**
     * @var EventPool
     */
    private $eventPool;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param EventPool $eventPool
     * @param LoggerInterface $logger
     */
    public function __construct(EventPool $eventPool, LoggerInterface $logger)
    {
        $this->eventPool = $eventPool;
        $this->logger = $logger;
    }

    /**
     * @inheritdoc
     */
    public function executeFull()
    {
        // TODO: Implement executeFull() method.
    }

    /**
     * @inheritdoc
     */
    public function executeList(array $ids)
    {
        // TODO: Implement executeList() method.
    }

    /**
     * @inheritdoc
     */
    public function executeRow($id)
    {
        // TODO: Implement executeRow() method.
    }

    /**
     * @inheritdoc
     */
    public function execute($ids)
    {
        $events = [];

        $indexData = $this->prepareIndexData($ids);

        foreach ($indexData as $priceType => $data) {
            $events[] = $this->eventPool->getEventResolver($priceType)->retrieve($data);
        }

        $events = !empty($events) ? \array_merge(...$events) : [];

        $this->logger->info('Product price events.', ['events' => $events]);
    }

    /**
     * Prepare index data
     *
     * @param array $indexData
     *
     * @return array
     */
    private function prepareIndexData(array $indexData): array
    {
        $output = [];
        foreach ($indexData as $data) {
            if (!\is_array($data)) {
                continue; // TODO throw exception / log error
            }

            $output[$data['price_type']][] = $data;
        }

        return $output;
    }
}
