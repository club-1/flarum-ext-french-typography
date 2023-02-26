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

namespace Club1\FrenchTypography\Formatter\FrenchFancyPants;

use s9e\TextFormatter\Plugins\FancyPants;

class Parser extends FancyPants\Parser
{
	/**
	* Parse pairs of double quotes
	*
	* Does quote pairs “” -- must be done separately to handle nesting
	*
	* @return void
	*/
	protected function parseDoubleQuotePairs()
	{
		if ($this->hasDoubleQuote)
		{
			$this->parseQuotePairs(
				'/(?<![0-9\\pL])"[^"\\n]+"(?![0-9\\pL])/uS',
				"\xC2\xAB\xC2\xA0",
				"\xC2\xA0\xC2\xBB"
			);
		}
	}
}

