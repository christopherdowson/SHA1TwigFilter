<?php
/**
 * sha1 Twig Filter plugin for Craft CMS 3.x/4.x
 *
 * A filter for twig to hash a string with sha1, based on the md5 filter by Daniel Jones.
 *
 * @link      https://myfirstraygun.studio
 * @copyright Copyright (c) 2022 Christopher Dowson
 */

namespace christopherdowson\sha1twigfilter\twigextensions;

use christopherdowson\sha1twigfilter\sha1TwigFilter;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Christopher Dowson
 * @package   sha1TwigFilter
 * @since     1.0.0
 */
class sha1TwigFilterTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'sha1TwigFilter';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('sha1', [$this, 'strSha1']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('sha1', [$this, 'strSha1']),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function strSha1($text = null)
    {
        $result = hash( 'sha1', $text );

        return $result;
    }
}
