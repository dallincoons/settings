<?php

namespace Tests\SMST\Settings\Fixtures;

use SMST\Settings\Repository\SettingsRepository;
use SMST\Settings\Setting;

class FakeSettingsRepository implements SettingsRepository
{
    protected $settings = [];

    public function add(Setting $setting)
    {
        $this->settings[$setting->key()] = $setting->value();
    }

    public function findByKey(string $key)
    {
        return $this->settings[$key];
    }

    public function update(Setting $setting)
    {
        //
    }

    public function remove(Setting $setting)
    {
        //
    }

    public function removeByKey(string $key)
    {
        //
    }
}
