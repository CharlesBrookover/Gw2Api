<?php

namespace Landfill\Gw2Api\Enums\Item;

enum WeaponType: string implements \Landfill\Gw2Api\Enums\IEnumsInterface
{

    case Axe = 'Axe';
    case Dagger = 'Dagger';
    case Focus = 'Focus';
    case Greatsword = 'Greatsword';
    case Hammer = 'Hammer';
    case Harpoon = 'Harpoon';
    case LargeBundle = 'LargeBundle';
    case LongBow = 'LongBow';
    case Mace = 'Mace';
    case Pistol = 'Pistol';
    case Rifle = 'Rifle';
    case Scepter = 'Scepter';
    case Shield = 'Shield';
    case ShortBow = 'ShortBow';
    case SmallBundle = 'SmallBundle';
    case Speargun = 'Speargun';
    case Staff = 'Staff';
    case Sword = 'Sword';
    case Torch = 'Torch';
    case Toy = 'Toy';
    case ToyTwoHanded = 'ToyTwoHanded';
    case Trident = 'Trident';
    case Warhorn = 'Warhorn';
    case Unknown = 'Unknown';
}