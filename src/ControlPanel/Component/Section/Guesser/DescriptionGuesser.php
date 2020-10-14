<?php

namespace Streams\Ui\ControlPanel\Component\Section\Guesser;

use Streams\Core\Addon\Module\ModuleCollection;
use Streams\Ui\ControlPanel\ControlPanelBuilder;

/**
 * Class DescriptionGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DescriptionGuesser
{

    /**
     * Guess the sections description.
     *
     * @param ControlPanelBuilder $builder
     */
    public static function guess(ControlPanelBuilder $builder)
    {
        if (!$module = app('module.collection')->active()) {
            return;
        }

        $sections = $builder->getSections();

        foreach ($sections as &$section) {

            // If description is set then skip it.
            if (isset($section['description'])) {
                continue;
            }

            $description = $module->getNamespace('section.' . $section['handle'] . '.description');

            if (trans()->has($description)) {
                $section['description'] = $description;
            }
        }

        $builder->setSections($sections);
    }
}
