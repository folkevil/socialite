<?php

/*
 * This file is part of the overtrue/socialite.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * AccessToken.php.
 *
 * This file is part of the socialite.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\Socialite;

use ArrayAccess;
use InvalidArgumentException;

/**
 * Class AccessToken.
 */
class AccessToken implements AccessTokenInterface, ArrayAccess
{
    use AttributeTrait;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * AccessToken constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        if (empty($attributes['access_token'])) {
            throw new InvalidArgumentException('The key "access_token" could not be empty.');
        }

        $this->attributes = $attributes;
    }

    /**
     * Return the access token string.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('access_token');
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return strval($this->getAttribute('access_token', ''));
    }
}