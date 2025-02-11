<?php

namespace Mautic\LeadBundle\Helper;

use Mautic\LeadBundle\Entity\Lead;
use Mautic\LeadBundle\Event\ListChangeEvent;

class CampaignEventHelper
{
    /**
     * @return bool
     */
    public static function validatePointChange($event, Lead $lead)
    {
        $properties  = $event['properties'];
        $checkPoints = $properties['points'];

        if (!empty($checkPoints)) {
            $points = $lead->getPoints();
            if ($points < $checkPoints) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    public static function validateListChange(ListChangeEvent $eventDetails, $event)
    {
        $limitAddTo      = $event['properties']['addedTo'];
        $limitRemoveFrom = $event['properties']['removedFrom'];
        $list            = $eventDetails->getList();

        if ($eventDetails->wasAdded() && !empty($limitAddTo) && !in_array($list->getId(), $limitAddTo)) {
            return false;
        }

        if ($eventDetails->wasRemoved() && !empty($limitRemoveFrom) && !in_array($list->getId(), $limitRemoveFrom)) {
            return false;
        }

        return true;
    }
}
