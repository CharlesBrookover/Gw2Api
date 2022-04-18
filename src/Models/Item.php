<?php

declare(strict_types=1);

namespace Landfill\Gw2Api\Models;

use Landfill\Gw2Api\Enums\IEnumsInterface;
use Landfill\Gw2Api\Enums\Item\Flags;
use Landfill\Gw2Api\Enums\Item\GameTypes;
use Landfill\Gw2Api\Enums\Item\Rarity;
use Landfill\Gw2Api\Enums\Item\Restrictions;
use Landfill\Gw2Api\Enums\Item\Type;
use Landfill\Gw2Api\Models;

class Item extends Models
{
    protected int                    $id           = 0;
    protected string                 $chat_link    = '';
    protected string                 $name         = '';
    protected ?string                $icon         = null;
    protected ?string                $description  = null;
    protected Type|IEnumsInterface   $type;
    protected Rarity|IEnumsInterface $rarity;
    protected int                    $level        = 0;
    protected int                    $vendor_value = -1;
    protected ?int                   $default_skin = null;
    /** @var \Landfill\Gw2Api\Enums\Item\Flags[] */
    protected array $flags = [];
    /** @var \Landfill\Gw2Api\Enums\Item\GameTypes[] */
    protected array $game_types = [];
    /** @var \Landfill\Gw2Api\Enums\Item\Restrictions[] */
    protected array $restrictions = [];
    /** @var \Landfill\Gw2Api\Models\Item\Upgrades[]|null */
    protected ?array $upgrades_into = [];
    /** @var \Landfill\Gw2Api\Models\Item\Upgrades[]|null */
    protected ?array $upgrades_from = [];
    /**
     * @var \Landfill\Gw2Api\Models\Item\IItemModelInterface|null
     */
    protected Models\Item\IItemModelInterface|null $details;

    /**
     * @return int
     */
    public function getId()
    : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getChatLink()
    : string
    {
        return $this->chat_link;
    }

    /**
     * @return string
     */
    public function getName()
    : string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getIcon()
    : ?string
    {
        return $this->icon;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    : ?string
    {
        return $this->description;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\Item\Type
     */
    public function getType()
    : Type
    {
        return $this->type;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\Type|string $type
     *
     * @return Item
     */
    public function setType(Type|string $type)
    : Item {
        $this->type = $this->stringToEnum($type, Type::class);
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\Item\Rarity
     */
    public function getRarity()
    : Rarity
    {
        return $this->rarity;
    }

    /**************
     * Getters
     **************/

    /**
     * @param \Landfill\Gw2Api\Enums\Item\Rarity|string $rarity
     *
     * @return Item
     */
    public function setRarity(Rarity|string $rarity)
    : Item {
        $this->rarity = $this->stringToEnum($rarity, Rarity::class);
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    : int
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getVendorValue()
    : int
    {
        return $this->vendor_value;
    }

    /**
     * @return int|null
     */
    public function getDefaultSkin()
    : ?int
    {
        return $this->default_skin;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\Item\Flags[]
     */
    public function getFlags()
    : array
    {
        return $this->flags;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\Flags[]|string[] $flags
     *
     * @return Item
     */
    public function setFlags(array $flags)
    : Item {
        foreach ($flags as $flag) {
            $this->flags[] = $this->stringToEnum($flag, Flags::class);
        }
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\Item\GameTypes[]
     */
    public function getGameTypes()
    : array
    {
        return $this->game_types;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\GameTypes[] $game_types
     *
     * @return Item
     */
    public function setGameTypes(array $game_types)
    : Item {
        foreach ($game_types as $game_type) {
            $this->game_types[] = $this->stringToEnum($game_type, GameTypes::class);
        }
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Enums\Item\Restrictions[]
     */
    public function getRestrictions()
    : array
    {
        return $this->restrictions;
    }

    /**
     * @param \Landfill\Gw2Api\Enums\Item\Restrictions[] $restrictions
     *
     * @return Item
     */
    public function setRestrictions(array $restrictions)
    : Item {
        foreach ($restrictions as $restriction) {
            $this->restrictions[] = $this->stringToEnum($restriction, Restrictions::class);
        }
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\Upgrades[]|null
     */
    public function getUpgradesInto()
    : ?array
    {
        return $this->upgrades_into;
    }

    /**
     * @param \Landfill\Gw2Api\Models\Item\Upgrades[]|null $upgrades_into
     *
     * @return Item
     */
    public function setUpgradesInto(?array $upgrades_into)
    : Item {
        foreach ($upgrades_into as $upgrade) {
            if (is_array($upgrade)) {
                $this->upgrades_into[] = Models\Item\Upgrades::fromArray($upgrade);
            }
        }
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\Upgrades[]|null
     */
    public function getUpgradesFrom()
    : ?array
    {
        return $this->upgrades_from;
    }

    /**
     * @param \Landfill\Gw2Api\Models\Item\Upgrades[]|null $upgrades_from
     *
     * @return Item
     */
    public function setUpgradesFrom(?array $upgrades_from)
    : Item {
        foreach ($upgrades_from as $upgrade) {
            if (is_array($upgrade)) {
                $this->upgrades_from[] = Models\Item\Upgrades::fromArray($upgrade);
            }
        }
        return $this;
    }

    /**
     * @return \Landfill\Gw2Api\Models\Item\Weapon|null
     */
    public function getDetails()
    : ?Item\Weapon
    {
        return $this->details;
    }

    /**
     * @param array|null $details
     *
     * @return Item
     */
    public function setDetails(?array $details)
    : Item {
        $this->details = match ($this->type) {
            Type::Armor            => throw new \Exception('To be implemented'),
            Type::Back             => throw new \Exception('To be implemented'),
            Type::Bag              => throw new \Exception('To be implemented'),
            Type::Consumable       => throw new \Exception('To be implemented'),
            Type::Container        => throw new \Exception('To be implemented'),
            Type::CraftingMaterial => throw new \Exception('To be implemented'),
            Type::Gathering        => throw new \Exception('To be implemented'),
            Type::Gizmo            => throw new \Exception('To be implemented'),
            Type::Key              => throw new \Exception('To be implemented'),
            Type::MiniPet          => throw new \Exception('To be implemented'),
            Type::Tool             => throw new \Exception('To be implemented'),
            Type::Trait            => throw new \Exception('To be implemented'),
            Type::Trinket          => throw new \Exception('To be implemented'),
            Type::Trophy           => throw new \Exception('To be implemented'),
            Type::UpgradeComponent => throw new \Exception('To be implemented'),
            Type::Weapon           => Models\Item\Weapon::fromArray($details),
            Type::Unknown          => null,
        };
        return $this;
    }


}