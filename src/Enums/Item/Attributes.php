<?php

namespace Landfill\Gw2Api\Enums\Item;

use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Attributes: string implements IEnumsInterface
{
    case AgonyResistance = 'AgonyResistance';
    case BoonDuration = 'BoonDuration';  // Concentration
    case ConditionDamage = 'ConditionDamage';
    case ConditionDuration = 'ConditionDuration'; // Expertise
    case CritDamage = 'CritDamage';               // Ferocity
    case Healing = 'Healing';
    case Power = 'Power';
    case Precision = 'Precision';
    case Toughness = 'Toughness';
    case Vitality = 'Vitality';
    case Unknown = 'Unknown';
}
