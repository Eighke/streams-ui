<?php

namespace Streams\Ui\ControlPanel\Component\Section;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Streams\Core\Support\Traits\Prototype;
use Streams\Core\Support\Facades\Hydrator;

/**
 * Class Section
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class Section implements Arrayable, Jsonable
{

    use Prototype;

    /**
     * The link attributes.
     *
     * @var array
     */
    protected $attributes = [
        'handle' => null,
        'title' => null,
        'label' => null,
        'parent' => null,
        'policy' => null,
        'matcher' => null,
        'permalink' => null,
        'breadcrumb' => null,
        'description' => null,
        'highlighted' => false,
        'context' => 'danger',
        'active' => false,
        'hidden' => false,
        'buttons' => [],
        'attributes' => [],
    ];

    /**
     * Return the href attribute.
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
}
