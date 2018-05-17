<?php

namespace SMST\Settings\SettingTypes;

use SMST\Settings\Exceptions\NotInPresetException;
use SMST\Settings\Setting;

abstract class PresetSetting extends Setting
{
    abstract public function presets(): array;

    public function __construct($value)
    {
        if (!in_array($value, $this->presets(), true)) {
            throw new NotInPresetException('Preset does not exist for value: ' . $value);
        }

        parent::__construct($value);
    }
}
