<?php

namespace Give\Framework\FieldsAPI;

/**
 * A file upload field.
 *
 * @unreleased
 */
class File extends Field {

	use Concerns\AllowMultiple;
	use Concerns\HasEmailTag;
	use Concerns\HasHelpText;
	use Concerns\HasLabel;
	use Concerns\ShowInReceipt;
	use Concerns\StoreAsMeta;

	const TYPE = 'file';

	/** @var int */
	protected $maxSize = 1024;

	/** @var string[] */
	protected $allowedTypes = [ '*' ];

	/**
	 * Set the maximum file size.
	 *
	 * @param int $maxSize
	 * @return $this
	 */
	public function maxSize( $maxSize ) {
		$this->maxSize = $maxSize;
		return $this;
	}

	/**
	 * Access the maximum file size.
	 *
	 * @return int
	 */
	public function getMaxSize() {
		return $this->maxSize;
	}

	/**
	 * Set the allowed file types.
	 *
	 * @param string[] $allowedTypes
	 * @return $this
	 */
	public function allowedTypes( $allowedTypes = [ '*' ] ) {
		$this->allowedTypes = $allowedTypes;
		return $this;
	}

	/**
	 * Access the allowed file types.
	 *
	 * @return string[]
	 */
	public function getAllowedTypes() {
		return $this->allowedTypes;
	}
}
