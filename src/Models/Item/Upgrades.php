<?php

namespace Landfill\Gw2Api\Models\Item;

use Landfill\Gw2Api\Models;

class Upgrades extends Models
{
    protected \Landfill\Gw2Api\Enums\Item\Upgrades $upgrade;
    protected int                                  $item_id;

    /**
     * @param \Landfill\Gw2Api\Enums\Item\Upgrades|string $upgrade
     *
     * @return Upgrades
     */
    public function setUpgrade(\Landfill\Gw2Api\Enums\Item\Upgrades|string $upgrade)
    : Upgrades {
        if (is_scalar($upgrade)) {
            $this->upgrade = \Landfill\Gw2Api\Enums\Item\Upgrades::tryFrom($upgrade) ?? \Landfill\Gw2Api\Enums\Item\Upgrades::Unknown;
        } else {
            $this->upgrade = $upgrade;
        }
        return $this;
    }

    /**
     * @param int $item_id
     *
     * @return Upgrades
     */
    public function setItemId(int $item_id)
    : Upgrades {
        $this->item_id = $item_id;
        return $this;
    }


}