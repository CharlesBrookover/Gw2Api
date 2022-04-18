<?php

namespace Landfill\Gw2Api\Enums\Item;

enum DamageType: string implements \Landfill\Gw2Api\Enums\IEnumsInterface
{

    case Fire = 'Fire';
    case Ice = 'Ice';
    case Lightning = 'Lightning';
    case Physical = 'Physical';
    case Choking = 'Choking';
    case Unknown = 'Unknown';
}