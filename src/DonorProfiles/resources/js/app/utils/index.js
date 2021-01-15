import { addTab } from '../store/actions';

export const registerTab = ( tab ) => {
	const { dispatch } = window.giveDonorProfile.store;

	// Validate the tab object
	if ( isValidTab( tab ) === true ) {
		dispatch( addTab( tab ) );
	} else {
		return null;
	}
};

const isValidTab = ( tab ) => {
	const tabPropTypes = {
		slug: 'string',
		icon: 'string',
		label: 'string',
		content: 'function',
	};

	const isValid = Object.keys( tabPropTypes ).reduce( ( acc, key ) => {
		if ( typeof tab[ key ] !== tabPropTypes[ key ] ) {
			/* eslint-disable-next-line */
			console.error( `Error registering tab! The '${ key }' property must be a ${ tabPropTypes[ key ] }.` );
			return false;
		} else if ( acc === false ) {
			return false;
		}
		return true;
	} );

	return isValid;
};

export const getWindowData = ( value ) => {
	const data = window.giveDonorProfileData;
	return data[ value ];
};

export const getAPIRoot = () => {
	return getWindowData( 'apiRoot' );
};

export const getAPINonce = () => {
	return getWindowData( 'apiNonce' );
};

/**
 * Returns string in Kebab Case (ex: kebab-case)
 *
 * @param {string} str String to be returned in Kebab Case
 * @return {string} String returned in Kebab Case
 * @since 2.8.0
 */
export const toKebabCase = ( str ) => {
	return str.replace( ' / ', ' ' )
		.replace( /([a-z])([A-Z])/g, '$1-$2' )
		.replace( /\s+/g, '-' )
		.toLowerCase();
};