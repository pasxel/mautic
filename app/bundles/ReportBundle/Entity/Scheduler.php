<?php

namespace Mautic\ReportBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;

class Scheduler
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Report
     */
    private $report;

    /**
     * @var \DateTimeInterface
     */
    private $scheduleDate;

    public static function loadMetadata(ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('reports_schedulers')
            ->setCustomRepositoryClass(SchedulerRepository::class);

        $builder->addId();

        $builder->createManyToOne('report', Report::class)
            ->addJoinColumn('report_id', 'id', false, false, 'CASCADE')
            ->build();

        $builder->createField('scheduleDate', Types::DATETIME_MUTABLE)
            ->columnName('schedule_date')
            ->nullable(false)
            ->build();
    }

    public function __construct(Report $report, \DateTimeInterface $scheduleDate)
    {
        $this->report       = $report;
        $this->scheduleDate = $scheduleDate;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Report
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getScheduleDate()
    {
        return $this->scheduleDate;
    }
}
