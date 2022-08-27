<?php

/**
 * Modified: 2020-05-26T22:07:25+00:00
 */
namespace Office365\OutlookServices;

use Office365\Runtime\ClientValue;
class LocationConstraint extends ClientValue
{
    /**
     * @var bool
     */
    public $IsRequired;
    /**
     * @var bool
     */
    public $SuggestLocation;
}