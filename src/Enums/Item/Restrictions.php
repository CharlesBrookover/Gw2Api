<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Restrictions: string implements IEnumsInterface
{

    case Asura = 'Asura';
    case Charr = 'Charr';
    case Female = 'Female';
    case Human = 'Human';
    case Norn = 'Norn';
    case Sylvari = 'Sylvari';
    case Elementalist = 'Elementalist';
    case Engineer = 'Engineer';
    case Guardian = 'Guardian';
    case Mesmer = 'Mesmer';
    case Necromancer = 'Necromancer';
    case Ranger = 'Ranger';
    case Thief = 'Thief';
    case Warrior = 'Warrior';
    case Unknown = 'Unknown';

}