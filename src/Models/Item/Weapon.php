<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Models\Item;

use Landfill\Gw2Api\Enums\IEnumsInterface;
use Landfill\Gw2Api\Enums\Item\DamageType;
use Landfill\Gw2Api\Enums\Item\WeaponType;
use Landfill\Gw2Api\Models;

class Weapon extends Models implements IItemModelInterface
{
    protected WeaponType|IEnumsInterface $type;
    protected DamageType|IEnumsInterface $damage_type;
    protected int                        $min_power = 0;
    protected int                        $max_power = 0;
    protected int                        $defense   = 0;
    /** @var \Landfill\Gw2Api\Models\Item\InfusionSlot[] */
    protected array                     $infusion_slots           = [];
    protected float                     $attribute_adjustment     = 0;
    protected ?Models\Item\InfixUpgrade $infix_upgrade            = null;
    protected ?int                      $suffix_item_id           = null;
    protected string                    $secondary_suffix_item_id = '';
    protected ?array                    $stat_choices             = null;


    /**
     * @param \Landfill\Gw2Api\Enums\Item\WeaponType|string $type
     *
     * @return $this
     */
    public function setType(WeaponType|string $type)
    : Weapon {
        $this->type = $this->stringToEnum($type, WeaponType::class);
        return $this;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\DamageType|string $damage_type
     *
     * @return Weapon
     */
    public function setDamageType(DamageType|string $damage_type)
    : Weapon {
        $this->damage_type = $this->stringToEnum($damage_type, DamageType::class);
        return $this;
    }

    /**
     * @param array $infusion_slots
     *
     * @return Weapon
     */
    public function setInfusionSlots(array $infusion_slots)
    : Weapon {
        foreach ($infusion_slots as $infusionSlot) {
            if (is_array($infusionSlot)) {
                $this->infusion_slots[] = InfusionSlot::fromArray($infusionSlot);
            }
        }
        return $this;
    }

    /**
     * @param array|null $infix_upgrade
     *
     * @return Weapon
     */
    public function setInfixUpgrade(?array $infix_upgrade)
    : Weapon {
        $this->infix_upgrade = InfixUpgrade::fromArray($infix_upgrade);
        return $this;
    }

    /*******************
     * Getters
     *******************/


    /**
     * @return \Landfill\Gw2Api\Enums\IEnumsInterface|\Landfill\Gw2Api\Enums\Item\WeaponType
     */
    public function getType()
    : IEnumsInterface|WeaponType
    {
        return $this->type;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\IEnumsInterface|\Landfill\Gw2Api\Enums\Item\DamageType
     */
    public function getDamageType()
    : DamageType|IEnumsInterface
    {
        return $this->damage_type;
    }

    /**
     * @return int
     */
    public function getMinPower()
    : int
    {
        return $this->min_power;
    }

    /**
     * @return int
     */
    public function getMaxPower()
    : int
    {
        return $this->max_power;
    }

    /**
     * @return int
     */
    public function getDefense()
    : int
    {
        return $this->defense;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\InfusionSlot[]
     */
    public function getInfusionSlots()
    : array
    {
        return $this->infusion_slots;
    }

    /**
     * @return float|int
     */
    public function getAttributeAdjustment()
    : float|int
    {
        return $this->attribute_adjustment;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\InfixUpgrade|null
     */
    public function getInfixUpgrade()
    : ?InfixUpgrade
    {
        return $this->infix_upgrade;
    }

    /**
     * @return int|null
     */
    public function getSuffixItemId()
    : ?int
    {
        return $this->suffix_item_id;
    }

    /**
     * @return string
     */
    public function getSecondarySuffixItemId()
    : string
    {
        return $this->secondary_suffix_item_id;
    }

    /**
     * @return array|null
     */
    public function getStatChoices()
    : ?array
    {
        return $this->stat_choices;
    }
}
