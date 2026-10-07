<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

enum IconType: string
{
    case DASHICONS = 'dashicons';
    case FONTAWESOME = 'fontawesome';
    case SVG = 'svg';
    case URL = 'url';
}
