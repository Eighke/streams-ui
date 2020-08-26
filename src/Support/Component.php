<?php

namespace Anomaly\Streams\Ui\Support;

use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Anomaly\Streams\Platform\Support\Facades\Hydrator;
use Anomaly\Streams\Platform\Support\Traits\Properties;
use Anomaly\Streams\Platform\Support\Traits\FiresCallbacks;

/**
 * Class Ui
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Component implements Arrayable, Jsonable
{
    use Macroable;
    use Properties;
    use FiresCallbacks;

    public function render(): ViewView
    {
        $fallback = "ui::{$this->component}/{$this->component}";

        return View::make($this->template ?: $fallback, [
            $this->component => $this,
        ]);
    }

    public function request($key, $default = null)
    {
        return Request::get($this->prefix($key), $default);
    }

    public function prefix($target = null): string
    {
        return $this->options->get('prefix') . $target;
    }

    public function toArray(): array
    {
        return Hydrator::dehydrate($this);
    }

    public function toJson($options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }

    public function __toString()
    {
        return (string) $this->render();
    }
}
