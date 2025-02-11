<?php

namespace Mautic\CampaignBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\ApiBundle\Serializer\Driver\ApiMetadataDriver;
use Mautic\CoreBundle\Doctrine\Mapping\ClassMetadataBuilder;

class FailedLeadEventLog
{
    /**
     * @var LeadEventLog
     */
    private $log;

    /**
     * @var \DateTimeInterface
     */
    private $dateAdded;

    /**
     * @var string|null
     */
    private $reason;

    public static function loadMetadata(ORM\ClassMetadata $metadata)
    {
        $builder = new ClassMetadataBuilder($metadata);

        $builder->setTable('campaign_lead_event_failed_log')
            ->setCustomRepositoryClass(FailedLeadEventLogRepository::class)
            ->addIndex(['date_added'], 'campaign_event_failed_date');

        $builder->createOneToOne('log', 'LeadEventLog')
            ->makePrimaryKey()
            ->inversedBy('failedLog')
            ->addJoinColumn('log_id', 'id', false, false, 'CASCADE')
            ->build();

        $builder->addDateAdded();

        $builder->addNullableField('reason', 'text');
    }

    /**
     * Prepares the metadata for API usage.
     */
    public static function loadApiMetadata(ApiMetadataDriver $metadata)
    {
        $metadata->setGroupPrefix('campaignEventFailedLog')
                 ->addProperties(
                     [
                         'dateAdded',
                         'reason',
                     ]
                 )
                 ->build();
    }

    /**
     * @return LeadEventLog
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param LeadEventLog $log
     *
     * @return FailedLeadEventLog
     */
    public function setLog(LeadEventLog $log = null)
    {
        $this->log = $log;

        if ($log) {
            $log->setFailedLog($this);
        }

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     *
     * @return FailedLeadEventLog
     */
    public function setDateAdded(\DateTime $dateAdded = null)
    {
        if (null === $dateAdded) {
            $dateAdded = new \DateTime();
        }

        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return FailedLeadEventLog
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }
}
