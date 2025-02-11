<?php

namespace Mautic\LeadBundle\Event;

use Mautic\LeadBundle\Entity\LeadList;
use Mautic\LeadBundle\Segment\Query\QueryBuilder;
use Symfony\Contracts\EventDispatcher\Event;

class LeadListQueryBuilderGeneratedEvent extends Event
{
    /**
     * @var LeadList
     */
    private $segment;

    /**
     * @var QueryBuilder
     */
    private $queryBuilder;

    public function __construct(LeadList $segment, QueryBuilder $queryBuilder)
    {
        $this->segment      = $segment;
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * @return LeadList
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }
}
