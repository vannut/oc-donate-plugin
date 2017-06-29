<?php

namespace Vannut\Donate\Models;

use Model;

class Settings extends Model
{


    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'vannut_donate_settings';

    public $settingsFields = 'fields.yaml';
}
