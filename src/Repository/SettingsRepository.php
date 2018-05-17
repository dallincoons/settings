<?php

namespace SMST\Settings\Repository;

use SMST\Settings\Setting;

interface SettingsRepository
{
    public function findByKey(string $key);
    public function add(Setting $setting);
    public function update(Setting $setting);
    public function remove(Setting $setting);
    public function removeByKey(string $key);
}
