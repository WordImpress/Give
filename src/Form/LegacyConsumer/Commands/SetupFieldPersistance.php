<?php

namespace Give\Form\LegacyConsumer\Commands;

use Give\Framework\FieldsAPI\FieldCollection;
use Give\Form\LegacyConsumer\FieldView;

/**
 * Persist custom field values as donation meta.
 *
 * @unreleased
 */
class SetupFieldPersistance implements HookCommandInterface {

	public function __construct( $donationID, $donationData ) {
		$this->donationID   = $donationID;
		$this->donationData = $donationData;
	}

	public function __invoke( $hook ) {
		$fieldCollection = new FieldCollection( 'root' );
		do_action( "give_fields_$hook", $fieldCollection, $this->donationData['give_form_id'] );
		$fieldCollection->walk( [ $this, 'process' ] );
	}

	public function process( $field ) {
		if ( isset( $_POST[ $field->getName() ] ) ) {
			$value = wp_strip_all_tags( $_POST[ $field->getName() ], true );

			if ( $field->shouldStoreAsDonorMeta() ) {
				$donorID = give_get_payment_meta( $this->donationID, '_give_payment_donor_id' );
				Give()->donor_meta->update_meta( $donorID, $field->getName(), $value );
			} else {
				// Store as Donation Meta - default behavior.
				give_update_payment_meta( $this->donationID, $field->getName(), $value );
			}
		}
	}
}
