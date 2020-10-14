<?php

namespace Streams\Ui\ControlPanel\Component\Shortcut;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Streams\Core\Support\Traits\Prototype;
use Streams\Core\Support\Facades\Hydrator;
use Streams\Ui\ControlPanel\Component\Shortcut\Shortcut;

/**
 * Class Shortcut
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Shortcut implements Arrayable, Jsonable
{

    use Prototype;

    /**
     * The shortcut attributes.
     *
     * @var array
     */
    protected $attributes = [
        'handle' => null,
        'title' => null,
        'label' => null,
        'policy' => null,
        'highlighted' => false,
        'context' => 'danger',
    ];

    /**
     * Return the HREF.
     *
     * @param  null $path
     * @return string
     */
    public function href($path = null)
    {
        return $this->getPrototypeAttribute('attributes.href') . ($path ? '/' . $path : $path);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return Hydrator::dehydrate($this);
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Dynamically retrieve attributes.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getPrototypeAttribute($key);
    }

    /**
     * Dynamically set attributes.
     *
     * @param  string  $key
     * @param  mixed $value
     */
    public function __set($key, $value)
    {
        $this->setPrototypeAttribute($key, $value);
    }
}
