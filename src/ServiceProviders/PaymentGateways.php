<?php

namespace Give\ServiceProviders;

use Give\Controller\PayPalWebhooks;
use Give\PaymentGateways\PaymentGateway;
use Give\PaymentGateways\PayPalCommerce\AdvancedCardFields;
use Give\PaymentGateways\PayPalCommerce\AjaxRequestHandler;
use Give\PaymentGateways\PayPalCommerce\DonationProcessor;
use Give\PaymentGateways\PayPalCommerce\Models\MerchantDetail;
use Give\PaymentGateways\PayPalCommerce\RefreshToken;
use Give\PaymentGateways\PayPalCommerce\Repositories\MerchantDetails;
use Give\PaymentGateways\PayPalCommerce\ScriptLoader;
use Give\PaymentGateways\PayPalCommerce\onBoardingRedirectHandler;
use Give\PaymentGateways\PayPalCommerce\PayPalClient;
use Give\PaymentGateways\PayPalCommerce\PayPalCommerce;
use Give\PaymentGateways\PayPalCommerce\Repositories\Webhooks;
use Give\PaymentGateways\PayPalStandard\PayPalStandard;
use Give\PaymentGateways\PaypalSettingPage;

/**
 * Class PaymentGateways
 *
 * The Service Provider for loading the Payment Gateways
 *
 * @since 2.8.0
 */
class PaymentGateways implements ServiceProvider {
	/**
	 * Array of PaymentGateway classes to be bootstrapped
	 *
	 * @var string[]
	 */
	public $gateways = [
		PayPalStandard::class,
		PayPalCommerce::class,
	];

	/**
	 * Array of SettingPage classes to be bootstrapped
	 *
	 * @var string[]
	 */
	private $gatewaySettingsPages = [
		PaypalSettingPage::class,
	];

	/**
	 * @inheritDoc
	 */
	public function register() {
		give()->singleton( PayPalWebhooks::class );
		give()->singleton( Webhooks::class );
		$this->registerPayPalCommerceClasses();
	}

	/**
	 * @inheritDoc
	 */
	public function boot() {
		add_filter( 'give_register_gateway', [ $this, 'bootGateways' ] );
		add_action( 'admin_init', [ $this, 'handleSellerOnBoardingRedirect' ] );
		add_action( 'give-settings_start', [ $this, 'registerPayPalSettingPage' ] );
	}

	/**
	 * Handle seller on boarding redirect.
	 *
	 * @since 2.8.0
	 */
	public function handleSellerOnBoardingRedirect() {
		give( onBoardingRedirectHandler::class )->boot();
	}

	/**
	 * Register all payment gateways setting pages with GiveWP.
	 *
	 * @since 2.8.0
	 */
	public function registerPayPalSettingPage() {
		foreach ( $this->gatewaySettingsPages as $page ) {
			give()->make( $page )->boot();
		}
	}

	/**
	 * Registers all of the payment gateways with GiveWP
	 *
	 * @since 2.8.0
	 *
	 * @param array $gateways
	 *
	 * @return array
	 */
	public function bootGateways( array $gateways ) {
		foreach ( $this->gateways as $gateway ) {
			/** @var PaymentGateway $gateway */
			$gateway = give( $gateway );

			$gateways[ $gateway->getId() ] = [
				'admin_label'    => $gateway->getName(),
				'checkout_label' => $gateway->getPaymentMethodLabel(),
			];

			$gateway->boot();
		}

		return $gateways;
	}

	/**
	 * Registers the classes for the PayPal Commerce gateway
	 *
	 * @since 2.8.0
	 */
	private function registerPayPalCommerceClasses() {
		give()->singleton( AdvancedCardFields::class );
		give()->singleton( DonationProcessor::class );
		give()->singleton( PayPalClient::class );
		give()->singleton( RefreshToken::class );
		give()->singleton( AjaxRequestHandler::class );
		give()->singleton( ScriptLoader::class );

		give()->singleton(
			MerchantDetail::class,
			static function () {
				return MerchantDetails::getDetails();
			}
		);
	}
}