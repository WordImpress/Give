/* globals jQuery */
import DonationForm from './DonationForm';
import SmartButtons from './SmartButtons';
import AdvancedCardFields from './AdvancedCardFields';
import CustomCardFields from './CustomCardFields';

document.addEventListener( 'DOMContentLoaded', () => {
	const $formWraps = document.querySelectorAll( '.give-form-wrap' );

	if ( ! $formWraps.length ) {
		return false;
	}

	$formWraps.forEach( $formWrap => {
		const $form = $formWrap.querySelector( '.give-form' );
		const smartButtons = new SmartButtons( $form );
		const customCardFields = new CustomCardFields( $form );

		smartButtons.boot();

		if ( AdvancedCardFields.canShow() ) {
			const advancedCardFields = new AdvancedCardFields( customCardFields );

			customCardFields.boot();
			advancedCardFields.boot();
		}
	} );

	// On form submit prevent submission for PayPal commerce.
	// Form submission will be take care internally by smart buttons or advanced card fields.
	jQuery( 'form.give-form' ).on( 'submit', e => {
		if ( ! DonationForm.isPayPalCommerceSelected( jQuery( this ) ) ) {
			return true;
		}

		e.preventDefault();

		return false;
	} );
} );