<?php

namespace Anomaly\Streams\Ui\ControlPanel\Component\Shortcut\Guesser;

use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Ui\ControlPanel\ControlPanelBuilder;

/**
 * Class TitleGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TitleGuesser
{

    /**
     * Guess the shortcuts title.
     *
     * @param ControlPanelBuilder $builder
     */
    public static function guess(ControlPanelBuilder $builder)
    {
        if (!$module = app('module.collection')->active()) {
            return;
        }

        $shortcuts = $builder->getShortcuts();

        foreach ($shortcuts as &$shortcut) {

            // If title is set then skip it.
            if (isset($shortcut['title'])) {
                continue;
            }

            $title = $module->getNamespace('shortcut.' . $shortcut['slug'] . '.title');

            if (!isset($shortcut['title']) && trans()->has($title)) {
                $shortcut['title'] = $title;
            }

            $title = $module->getNamespace('addon.shortcut.' . $shortcut['slug']);

            if (!isset($shortcut['title']) && trans()->has($title)) {
                $shortcut['title'] = $title;
            }

            if (!isset($shortcut['title']) && config('streams.system.lazy_translations')) {
                $shortcut['title'] = ucwords(humanize($shortcut['slug']));
            }

            if (!isset($shortcut['title'])) {
                $shortcut['title'] = $title;
            }
        }

        $builder->setShortcuts($shortcuts);
    }
}
