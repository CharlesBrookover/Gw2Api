<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Upgrades: string implements IEnumsInterface
{

    case Attunement = 'Attunement';
    case Infusion = 'Infusion';
    case Unknown = 'Unknown';
}