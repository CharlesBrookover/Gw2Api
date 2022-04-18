<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Enums\Item;


use Landfill\Gw2Api\Enums\IEnumsInterface;

enum Type: string implements IEnumsInterface
{
    case Armor = 'Armor';
    case Back = 'Back';
    case Bag = 'Bag';
    case Consumable = 'Consumable';
    case Container = 'Container';
    case CraftingMaterial = 'CraftingMaterial';
    case Gathering = 'Gathering';
    case Gizmo = 'Gizmo';
    case Key = 'Key';
    case MiniPet = 'MiniPet';
    case Tool = 'Tool';
    case Trait = 'Trait';
    case Trinket = 'Trinket';
    case Trophy = 'Trophy';
    case UpgradeComponent = 'UpgradeComponent';
    case Weapon = 'Weapon';
    case Unknown = 'Unknown';

}