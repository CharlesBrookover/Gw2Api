<?php

namespace Landfill\Gw2Api\Models\Item\Infix;

use Landfill\Gw2Api\Enums\IEnumsInterface;
use Landfill\Gw2Api\Enums\Item\Attributes;
use Landfill\Gw2Api\Models;

class Attribute extends Models
{
    protected Attributes|IEnumsInterface $attribute;
    protected int                        $modifier;


    /**
     * @param \Landfill\Gw2Api\Enums\Item\Attributes|string $attribute
     *
     * @return Attribute
     */
    public function setAttribute(Attributes|string $attribute)
    : Attribute {
        $this->attribute = $this->stringToEnum($attribute, Attributes::class);
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\IEnumsInterface|\Landfill\Gw2Api\Enums\Item\Attributes
     */
    public function getAttribute()
    : IEnumsInterface|Attributes
    {
        return $this->attribute;
    }

    /**
     * @return int
     */
    public function getModifier()
    : int
    {
        return $this->modifier;
    }
}
