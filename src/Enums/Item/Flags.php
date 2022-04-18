<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Flags: string implements IEnumsInterface
{

    case AccountBindOnUse = 'AccountBindOnUse';
    case AccountBound = 'AccountBound';
    case Attuned = 'Attuned';
    case BulkConsume = 'BulkConsume';
    case DeleteWarning = 'DeleteWarning';
    case HideSuffix = 'HideSuffix';
    case Infused = 'Infused';
    case MonsterOnly = 'MonsterOnly';
    case NoMysticForge = 'NoMysticForge';
    case NoSalvage = 'NoSalvage';
    case NoSell = 'NoSell';
    case NotUpgradeable = 'NotUpgradeable';
    case NoUnderwater = 'NoUnderwater';
    case SoulbindOnAcquire = 'SoulbindOnAcquire';
    case SoulBindOnUse = 'SoulBindOnUse';
    case Tonic = 'Tonic';
    case Unique = 'Unique';
    case Unknown = 'Unknown';

}