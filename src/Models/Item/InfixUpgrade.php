<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Models\Item;

use Landfill\Gw2Api\Models;
use Landfill\Gw2Api\Models\Item\Infix\Attribute;
use Landfill\Gw2Api\Models\Item\Infix\Buff;

class InfixUpgrade extends Models
{
    protected int $id = 0;
    /** @var Attribute[] */
    protected array $attributes = [];
    protected ?Buff $buff       = null;

    /**
     * @param array $attributes
     *
     * @return InfixUpgrade
     */
    public function setAttributes(array $attributes)
    : InfixUpgrade {
        foreach ($attributes as $attribute) {
            if (is_array($attribute)) {
                $this->attributes[] = Attribute::fromArray($attribute);
            }
        }
        return $this;
    }

    /**
     * @param object|null $buff
     *
     * @return InfixUpgrade
     */
    public function setBuff(?array $buff)
    : InfixUpgrade {
        if (is_array($buff)) {
            $this->buff = Buff::fromArray($buff);
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    : int
    {
        return $this->id;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\Infix\Attribute[]
     */
    public function getAttributes()
    : array
    {
        return $this->attributes;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\Infix\Buff|null
     */
    public function getBuff()
    : ?Buff
    {
        return $this->buff;
    }


}
