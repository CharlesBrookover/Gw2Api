<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Models\Item;

use Landfill\Gw2Api\Enums\Item\InfusionFlags;
use Landfill\Gw2Api\Models;

class InfusionSlot extends Models
{
    /** @var InfusionFlags[] */
    protected array $flags;
    protected ?int  $item_id = null;

    /**
     * @return \Landfill\Gw2Api\Enums\Item\InfusionFlags[]
     */
    public function getFlags()
    : array
    {
        return $this->flags;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\InfusionFlags[] $flags
     *
     * @return InfusionSlot
     */
    public function setFlags(array $flags)
    : InfusionSlot {
        foreach ($flags as $flag) {
            $this->flags[] = $this->stringToEnum($flag, InfusionFlags::class);
        }
        return $this;
    }

    /**
     * @return int|null
     */
    public function getItemId()
    : ?int
    {
        return $this->item_id;
    }

}