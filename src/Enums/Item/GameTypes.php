<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum GameTypes: string implements IEnumsInterface
{

    case Activity = 'Activity';
    case Dungeon = 'Dungeon';
    case Pve = 'Pve';
    case Pvp = 'Pvp';
    case PvpLobby = 'PvpLobby';
    case Wvw = 'Wvw';
    case Unknown = 'Unknown';
}