<?php

/*
 * This file is part of club-1/flarum-ext-french-typography.
 *
 * Copyright (c) 2023 Nicolas Peugnet <nicolas@club1.fr>.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace Club1\FrenchTypography\Formatter;

use s9e\TextFormatter;

class Configurator
{
    public function __invoke(TextFormatter\Configurator $configurator): void
    {
        $this->configurePunctuation($configurator);
    }

    public function configurePunctuation(TextFormatter\Configurator $configurator): void
    {
        $tagname = 'FRPUNCT';
        $tag = $configurator->tags->add($tagname);
        $tag->attributes->add('punct');
        $tag->template = '&nbsp;<xsl:value-of select="@punct"/>';
        $configurator->Preg->match('/ +(?<punct>[?!:;])/', $tagname);
    }
}
