<?php

namespace Vannut\Donate;

use Carbon\Carbon;
use Backend;
use Cms\Classes\Theme;
use System\Classes\SettingsManager;

class Plugin extends \System\Classes\PluginBase
{



    public function pluginDetails()
    {
        return [
            'name' => 'Donate via Mollie',
            'description' => 'Accept donations via Mollie (CC/Paypal/iDeal/many more)',
            'author' => 'Richard @ Van Nut',
            'icon' => 'icon-money'
        ];
    }

    public function registerNavigation()
    {
        return [];
        // return [
        //     'DeGroeneBoot' => [
        //         'label'       => 'De Groene Boot',
        //         'url'         => Backend::url('vannut/degroeneboot'),
        //         'icon'        => 'icon-leaf',
        //         'permissions' => ['vannut.degroeneboot.*'],
        //         'order'       => 500,
        //
        //         'sideMenu' => [
        //             'categorie' => [
        //                 'label'       => 'Categorieën',
        //                 'icon'        => 'icon-copy',
        //                 'url'         => Backend::url('vannut/degroeneboot/categorie'),
        //                 'permissions' => ['vannut.degroeneboot.*']
        //             ],
        //             'activiteiten' => [
        //                 'label'       => 'Activiteiten',
        //                 'icon'        => 'icon-bullseye',
        //                 'url'         => Backend::url('vannut/degroeneboot/activiteiten'),
        //                 'permissions' => ['vannut.degroeneboot.*']
        //             ],
        //             'evenementen' => [
        //                 'label'       => 'Evenementen',
        //                 'icon'        => 'icon-calendar',
        //                 'url'         => Backend::url('vannut/degroeneboot/evenementen'),
        //                 'permissions' => ['vannut.degroeneboot.*']
        //             ],
        //             'partners' => [
        //                 'label'       => 'Partners',
        //                 'icon'        => 'icon-users',
        //                 'url'         => Backend::url('vannut/degroeneboot/partners'),
        //                 'permissions' => ['vannut.degroeneboot.*']
        //             ]
        //
        //         ]
        //     ]
        // ];
    }


    public function registerPermissions()
    {
        return [
            'vannut.donate.manage' => [
                'label' => 'Manage donate settings',
                'tab' => 'Donate'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'donate-via-mollie' => [
                'label'       => 'Donate via Mollie',
                'description' => 'Settings for the donate-plugin',
                'category'    => SettingsManager::CATEGORY_SYSTEM,
                'icon'        => 'icon-money',
                'class'       => 'Vannut\Donate\Models\Settings',
                'order'       => 200,
                'keywords'    => 'donate donatino vannut',
                'permissions' => ['vannut.donate.manage']
            ]
        ];
    }
    public function registerPageSnippets()
    {
        return [
           'Vannut\Donate\Components\BasicButton' => 'donateBasicButton',
           'Vannut\Donate\Components\ButtonWithList' => 'donateButtonWithList',
           'Vannut\Donate\Components\DonationStatus' => 'donationStatus',

         ];
    }

    public function registerComponents()
    {
        return [
            'Vannut\Donate\Components\BasicButton' => 'donateBasicButton',
            'Vannut\Donate\Components\ButtonWithList' => 'donateButtonWithList',
            'Vannut\Donate\Components\DonationStatus' => 'donationStatus',
        ];
    }


    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'svg' => [$this, 'includeSvgContent'],
                'dump_array' => [$this, 'twig_dump_array'],
            ],
            'functions' => [

            ]
        ];
    }

    public function includeSvgContent($path)
    {
        $theme = Theme::getActiveTheme();
        $path = $theme->getPath().'/'.ltrim($path, '/');

        $content = file_get_contents($path);
        return $content;
    }
    public function twig_dump_array($text)
    {
        return dump($text);
    }

















    //
}
