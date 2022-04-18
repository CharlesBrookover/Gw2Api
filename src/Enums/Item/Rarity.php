<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Rarity: string implements IEnumsInterface
{

    case Junk = 'Junk';
    case Basic = 'Basic';
    case Fine = 'Fine';
    case Masterwork = 'Masterwork';
    case Rare = 'Rare';
    case Exotic = 'Exotic';
    case Ascended = 'Ascended';
    case Legendary = 'Legendary';
    case Unknown = 'Unknown';
}