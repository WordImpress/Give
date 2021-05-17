<?php

declare( strict_types=1 );

namespace Give\Framework\Exceptions\Contracts;

interface LoggableException {
	/**
	 * Returns the human-readable message for the log
	 *
	 * @unreleased
	 *
	 * @return string
	 */
	public function getLogMessage();

	/**
	 * Returns an associated array with additional context for the log
	 *
	 * @unreleased
	 *
	 * @return array
	 */
	public function getLogContext();
}