<?php

namespace Mautic\ReportBundle\Event;

use Mautic\ReportBundle\Entity\Report;

class ReportDataEvent extends AbstractReportEvent
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var array
     */
    private $options = [];

    /**
     * @var int
     */
    private $totalResults = 0;

    public function __construct(Report $report, array $data, $totalResults, array $options)
    {
        $this->context      = $report->getSource();
        $this->report       = $report;
        $this->data         = $data;
        $this->options      = $options;
        $this->totalResults = (int) $totalResults;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return ReportDataEvent
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return int
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }
}
