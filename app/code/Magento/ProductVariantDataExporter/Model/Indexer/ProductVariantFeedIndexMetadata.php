<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ProductVariantDataExporter\Model\Indexer;

use Magento\DataExporter\Model\Indexer\FeedIndexMetadata;

/**
 * Product variant feed indexer metadata provider
 */
class ProductVariantFeedIndexMetadata extends FeedIndexMetadata
{
    /**
     * @var string
     */
    protected $feedTableParentField;

    /**
     * @var string
     */
    protected $feedTableChildField;

    /**
     * @var string
     */
    protected $relationsTableName;

    /**
     * @var string
     */
    private $relationsTableParentField;

    /**
     * @var string
     */
    private $relationsTableChildField;

    /**
     * @param string $feedName
     * @param string $sourceTableName
     * @param string $sourceTableField
     * @param string $feedIdentity
     * @param string $feedTableName
     * @param string $feedTableField
     * @param array $feedTableMutableColumns
     * @param string $feedTableParentField
     * @param string $feedTableChildField
     * @param string $relationsTableName
     * @param string $relationsTableParentField
     * @param string $relationsTableChildField
     * @param int $batchSize
     */
    public function __construct(
        string $feedName,
        string $sourceTableName,
        string $sourceTableField,
        string $feedIdentity,
        string $feedTableName,
        string $feedTableField,
        array $feedTableMutableColumns,
        string $feedTableParentField,
        string $feedTableChildField,
        string $relationsTableName,
        string $relationsTableParentField,
        string $relationsTableChildField,
        int $batchSize = 100
    ) {
        parent::__construct(
            $feedName,
            $sourceTableName,
            $sourceTableField,
            $feedIdentity,
            $feedTableName,
            $feedTableField,
            $feedTableMutableColumns,
            $batchSize
        );
        $this->feedTableParentField = $feedTableParentField;
        $this->feedTableChildField = $feedTableChildField;
        $this->relationsTableName = $relationsTableName;
        $this->relationsTableParentField = $relationsTableParentField;
        $this->relationsTableChildField = $relationsTableChildField;
    }

    /**
     * Get feed table variant parent product field
     *
     * @return string
     */
    public function getFeedTableParentField(): string
    {
        return $this->feedTableParentField;
    }

    /**
     * Get feed table product field
     *
     * @return string
     */
    public function getFeedTableChildField(): string
    {
        return $this->feedTableChildField;
    }

    /**
     * Get relations table name
     *
     * @return string
     */
    public function getRelationsTableName(): string
    {
        return $this->relationsTableName;
    }

    /**
     * Get relations table child field
     *
     * @return string
     */
    public function getRelationsTableChildField(): string
    {
        return $this->relationsTableChildField;
    }

    /**
     * Get relations table parent field
     *
     * @return string
     */
    public function getRelationsTableParentField(): string
    {
        return $this->relationsTableParentField;
    }
}
