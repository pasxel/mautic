<?php

namespace Mautic\SmsBundle\Event;

use Mautic\CoreBundle\Event\CommonEvent;
use Mautic\LeadBundle\Entity\Lead;

class SmsSendEvent extends CommonEvent
{
    /**
     * @var int
     */
    protected $smsId;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var Lead
     */
    protected $lead;

    /**
     * @param string $content
     */
    public function __construct($content, Lead $lead)
    {
        $this->content = $content;
        $this->lead    = $lead;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return Lead
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * @param Lead $lead
     */
    public function setLead($lead)
    {
        $this->lead = $lead;
    }

    /**
     * @return int
     */
    public function getSmsId()
    {
        return $this->smsId;
    }

    /**
     * @param int $smsId
     */
    public function setSmsId($smsId)
    {
        $this->smsId = $smsId;
    }
}
