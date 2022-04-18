<?php

namespace Landfill\Gw2Api;

use Landfill\Gw2Api\Enums\IEnumsInterface;

abstract class Models implements \JsonSerializable
{

    private const UNKNOWN_ENUM = 'Unknown';

    /**
     * @param array $data
     */
    private function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $setter = $this->setter($key);
            if ($setter) {
                $this->$setter($value);
            } elseif (in_array($key, array_keys(get_object_vars($this)))) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Determine if a setter method exists
     *
     * @param string $name
     *
     * @return string|null
     */
    protected function setter(string $name)
    : ?string {
        $setter = sprintf('set%s', str_replace('_', '', ucwords($name, '_')));
        return method_exists($this, $setter) ? $setter : null;
    }

    /**
     * Create a new model from a JSON string
     *
     * @param string $json
     *
     * @return static
     */
    public static function fromJson(string $json)
    : static {
        $data = json_decode($json, true);
        return new static($data);
    }

    /**
     * Create a new model from an Array
     *
     * @param array|null $array
     *
     * @return static
     */
    public static function fromArray(?array $array)
    : static {
        return new static($array ?? []);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    : mixed {
        $getter = $this->getter($name);
        if ($getter) {
            return $this->$getter();
        } elseif (in_array($name, array_keys(get_object_vars($this)))) {
            return $this->$name;
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    /**
     * Determine if a getter method exists
     *
     * @param string $name
     *
     * @return string|null
     */
    protected function getter(string $name)
    : ?string {
        $getter = sprintf('get%s', str_replace('_', '', ucwords($name, '_')));
        return method_exists($this, $getter) ? $getter : null;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name)
    : bool {
        return isset($this->$name);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    : array
    {
        $json = [];
        foreach (array_keys(get_object_vars($this)) as $name) {
            $json[$name] = $this->$name;
        }

        return $json;
    }

    /**
     * Assign an Enum based on a string value
     *
     * @param \UnitEnum $enum
     * @param string    $value
     *
     * @return \UnitEnum|null
     */
    protected function assignEnum(\UnitEnum $enum, string $value)
    : ?\UnitEnum {
        $return = $enum::tryFrom($value) ?? null;
        if (is_null($return)) {
            $return = $enum::from(self::UNKNOWN_ENUM);
        }
        return $return;
    }

    /**
     * Assign an Enum based on a string value
     *
     * @param \Landfill\Gw2Api\Enums\IEnumsInterface|string $value
     * @param string                                        $enumName
     *
     * @return \Landfill\Gw2Api\Enums\IEnumsInterface
     */
    protected function stringToEnum(IEnumsInterface|string $value, string $enumName)
    : IEnumsInterface {
        /** @var \UnitEnum $enumName */
        if (is_scalar($value)) {
            if (enum_exists($enumName)) {
                return $enumName::tryFrom($value) ?? $enumName::from(self::UNKNOWN_ENUM);
            } else {
                return $enumName::from(self::UNKNOWN_ENUM);
            }
        } else {
            return $value;
        }
    }
}