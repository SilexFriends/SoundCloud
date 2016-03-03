<?php
declare(strict_types = 1);

namespace MrPrompt\Silex;

/**
 * SoundCloud Service Interface
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
interface SoundCloudInterface
{
    /**
     * @const string
     */
    const NAME = 'soundcloud';

    /**
     * Create an SoundCloud media
     *
     * @param string $url
     * @return array
     */
    public function create(string $url): array;
}
