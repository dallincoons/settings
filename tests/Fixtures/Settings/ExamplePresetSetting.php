<?php

namespace Tests\SMST\Settings\Fixtures\Settings;

use SMST\Settings\SettingTypes\PresetSetting;

class ExamplePresetSetting extends PresetSetting
{
    public function presets(): array
    {
        return [
            'preset1',
            '2'
        ];
    }
}
