<?php

namespace Landfill\Gw2Api\Tests\Models;

use Landfill\Gw2Api\Enums\IEnumsInterface;
use Landfill\Gw2Api\Enums\Item\DamageType;
use Landfill\Gw2Api\Enums\Item\Flags;
use Landfill\Gw2Api\Enums\Item\GameTypes;
use Landfill\Gw2Api\Enums\Item\Rarity;
use Landfill\Gw2Api\Enums\Item\Restrictions;
use Landfill\Gw2Api\Enums\Item\Type;
use Landfill\Gw2Api\Enums\Item\Upgrades;
use Landfill\Gw2Api\Enums\Item\WeaponType;
use Landfill\Gw2Api\Models\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{

    private const UNKNOWN_ENUM = 'Unknown';

    private string $jsonDataPath  = __DIR__ . '/../data/json/Item';
    private array  $jsonDataFiles = [
        'weapon' => 'item_weapon_28445.json',
    ];

    public function testWeapon()
    : void
    {
        $jsonString = $this->readDataFile($this->jsonDataFiles['weapon']);

        $testData = json_decode($jsonString, true);

        $item = Item::fromJson($jsonString);
        $this->baseItemTests($item, $testData);

        $testData_details = $testData['details'] ?? [];
        /** @var \Landfill\Gw2Api\Models\Item\Weapon $details */
        $details = $item->getDetails();
        $this->assertInstanceOf(Item\Weapon::class, $details);

        $this->testEnum($testData_details['type'] ?? self::UNKNOWN_ENUM, $details->getType(), WeaponType::class);
        $this->testEnum($testData_details['damage_type'] ?? self::UNKNOWN_ENUM, $details->getDamageType(), DamageType::class);

        $this->assertSame($testData_details['min_power'] ?? 0, $details->getMinPower());
        $this->assertSame($testData_details['max_power'] ?? 0, $details->getMaxPower());
        $this->assertSame($testData_details['attribute_adjustment'] ?? 0, $details->getAttributeAdjustment());
        $this->assertSame($testData_details['defense'] ?? 0, $details->getDefense());
        $this->assertSame($testData_details['suffix_item_id'] ?? null, $details->getSuffixItemId());
        $this->assertSame($testData_details['secondary_suffix_item_id'] ?? '', $details->getSecondarySuffixItemId());

        $this->assertIsArray($details->getInfusionSlots());
        $this->testInfusionSlots($testData_details['infusion_slots'] ?? [], $details->getInfusionSlots());

        $this->testInfixUpgrades($testData_details['infix_upgrade'] ?? [], $details->getInfixUpgrade());

        $this->assertIsArray($details->getStatChoices() ?? []);
    }

    protected function readDataFile(string $filename)
    : string {
        return file_get_contents(sprintf('%s/%s', $this->jsonDataPath, $filename));
    }

    protected function baseItemTests(Item $item, array &$testData)
    : void {
        $this->assertSame($testData['name'] ?? null, $item->getName());
        $this->assertSame($testData['description'] ?? null, $item->getDescription());
        $this->assertSame($testData['level'] ?? null, $item->getLevel());
        $this->assertSame($testData['vendor_value'] ?? null, $item->getVendorValue());
        $this->assertSame($testData['default_skin'] ?? null, $item->getDefaultSkin());
        $this->assertSame($testData['id'] ?? null, $item->getId());
        $this->assertSame($testData['chat_link'] ?? null, $item->getChatLink());
        $this->assertSame($testData['icon'] ?? null, $item->getIcon());

        $this->testEnum($testData['type'] ?? self::UNKNOWN_ENUM, $item->getType(), Type::class);
        $this->testEnum($testData['rarity'] ?? self::UNKNOWN_ENUM, $item->getRarity(), Rarity::class);

        $this->assertIsArray($item->getFlags());
        $this->testArrayOfEnums($testData['flags'] ?? [], $item->getFlags(), Flags::class);
        $this->assertIsArray($item->getGameTypes());
        $this->testArrayOfEnums($testData['game_types'] ?? [], $item->getGameTypes(), GameTypes::class);
        $this->assertIsArray($item->getRestrictions());
        $this->testArrayOfEnums($testData['restrictions'] ?? [], $item->getRestrictions(), Restrictions::class);
        $this->assertIsArray($item->getUpgradesInto());
        $this->testArrayOfEnums($testData['upgrades_into'] ?? [], $item->getUpgradesInto(), Upgrades::class);
        $this->assertIsArray($item->getUpgradesFrom());
        $this->testArrayOfEnums($testData['upgrades_from'] ?? [], $item->getUpgradesFrom(), Upgrades::class);
    }

    protected function testEnum(string $testData, IEnumsInterface $actual, string $enumName)
    : void {
        /** @var \UnitEnum $enumName */
        $testItem = $enumName::tryFrom($testData) ?? $enumName::tryFrom(self::UNKNOWN_ENUM);
        $this->assertSame($testItem, $actual);
    }

    protected function testArrayOfEnums(array $testData, array $enumArray, string $enumName)
    : void {
        $this->assertCount(count($testData), $enumArray);
        foreach ($testData as $testDatum) {
            /** @var \UnitEnum $enumName */
            $this->assertContains($enumName::tryFrom($testDatum), $enumArray);
        }
    }

    protected function testInfusionSlots(array $testData, array $actualData)
    : void {
        foreach ($actualData as $infusionSlot) {
            $this->assertInstanceOf(Item\InfusionSlot::class, $infusionSlot);
        }
    }

    protected function testInfixUpgrades(array $testData, ?Item\InfixUpgrade $actualData)
    {
        if (is_null($actualData)) {
            $this->assertSame($testData, $actualData);
        } else {
            $this->assertSame($testData['id'] ?? null, $actualData->getId());

            if (is_null($actualData->getBuff())) {
                $this->assertSame($testData['buff'] ?? null, $actualData->getBuff());
            } else {
                $this->assertInstanceOf(Item\Infix\Buff::class, $actualData->getBuff());
            }

            foreach ($actualData->getAttributes() as $attribute) {
                $this->assertInstanceOf(Item\Infix\Attribute::class, $attribute);
            }
        }
    }
}
