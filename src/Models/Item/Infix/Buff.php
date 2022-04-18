<?php

namespace Landfill\Gw2Api\Models\Item\Infix;

class Buff extends \Landfill\Gw2Api\Models
{
    protected int     $skill_id    = 0;
    protected ?string $description = null;

    /**
     * @return int
     */
    public function getSkillId()
    : int
    {
        return $this->skill_id;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    : ?string
    {
        return $this->description;
    }


}