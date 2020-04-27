<?php

use Give\Form\Template\Options;
use function Give\Helpers\Form\Template\Utils\Frontend\getFormId;

$formInfo = get_post( getFormId() );

// Setup dynamic defaults
$introHeadline    = $formInfo->post_title ? $formInfo->post_title : __( 'Campaign Heading', 'give' );
$introDescription = $formInfo->post_excerpt ? $formInfo->post_excerpt : __( 'Help make a difference today! All donations go directly to making a difference for our cause.', 'give' );

return [
	'introduction'        => [
		'name'   => __( 'Introduction', 'give' ),
		'desc'   => __( 'Step description will show up here if any', 'give' ),
		'fields' => [
			[
				'name'    => __( 'Include Introduction', 'give' ),
				'desc'    => __( 'Should this form include an introduction section?', 'give' ),
				'id'      => 'enabled',
				'type'    => 'radio_inline',
				'options' => [
					'enabled'  => __( 'Enabled', 'give' ),
					'disabled' => __( 'Disabled', 'give' ),
				],
				'default' => 'enabled',
			],
			[
				'id'         => 'headline',
				'name'       => __( 'Headline', 'give' ),
				'desc'       => __( 'Do you want to customize the headline for this form? We recommend keeping it to no more than 8 words as a best practive. If no title is provided the fallback will be your form’s post title.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => $introHeadline,
				],
				'default'    => $introHeadline,
			],
			[
				'id'         => 'description',
				'name'       => __( 'Description', 'give' ),
				'desc'       => __( 'Do you want to customize the description for this form? The description displays below the headline. We recommend keeping it to 1-2 short sentences. If no description is provided the fallback will be your form’s excerpt.', 'give' ),
				'type'       => 'textarea',
				'attributes' => [
					'placeholder' => $introDescription,
				],
				'default'    => $introDescription,
			],
			[
				'id'   => 'image',
				'name' => __( 'Image', 'give' ),
				'desc' => __( 'Upload an eye-catching image that reflects your cause. The image is required and if none is provided the featured image will be a the fallback. If none is set you will see a placeholder image displayed on the form. For best results use an image that’s 600x400 pixels.', 'give' ),
				'type' => 'file',
			],
			[
				'id'      => 'primary_color',
				'name'    => __( 'Primary Color', 'give' ),
				'desc'    => __( 'The primary color is used through the Form Template for various elements including buttons, line breaks, and focus and hover elements. Set a color that reflects your brand or main featured image for best results.', 'give' ),
				'type'    => 'colorpicker',
				'default' => '#28C77B',
			],
			[
				'id'         => 'donate_label',
				'name'       => __( 'Donate Button', 'give' ),
				'desc'       => __( 'The button label for displaying the additional payment fields.', 'give' ),
				'type'       => 'text_medium',
				'attributes' => [
					'placeholder' => __( 'Donate Now', 'give' ),
				],
				'default'    => __( 'Donate Now', 'give' ),
			],
		],
	],
	'payment_amount'      => [
		'name'   => __( 'Payment Amount', 'give' ),
		'desc'   => __( 'Step description will show up here if any', 'give' ),
		'fields' => [
			[
				'id'         => 'header_label',
				'name'       => __( 'Header Label', 'give' ),
				'desc'       => __( 'Do you want to customize the header label for the payment amount step? We recommend keeping it to no more than 5 words as a best practive.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'Choose Amount', 'give' ),
				],
				'default'    => __( 'Choose Amount', 'give' ),
			],
			[
				'id'         => 'content',
				'name'       => __( 'Content', 'give' ),
				'desc'       => __( 'Do you want to customize the content that appears before amount options? The content displays above the amount option buttons during the second step. We recommend keeping it to 1-2 short sentences.', 'give' ),
				'type'       => 'textarea',
				'attributes' => [
					'placeholder' => __( 'As a contributor to Save the Whales we make sure your money gets put to work. How much would you like to donate? Your donation goes directly to supporting our cause.', 'give' ),
				],
				'default'    => __( 'As a contributor to Save the Whales we make sure your money gets put to work. How much would you like to donate? Your donation goes directly to supporting our cause.', 'give' ),
			],
			[
				'id'         => 'next_label',
				'name'       => __( 'Continue Button', 'give' ),
				'desc'       => __( 'The button label for displaying the additional payment fields.', 'give' ),
				'type'       => 'text_medium',
				'attributes' => [
					'placeholder' => __( 'Continue', 'give' ),
				],
				'default'    => __( 'Continue', 'give' ),
			],
		],
	],
	'payment_information' => [
		'name'   => __( 'Payment Information', 'give' ),
		'desc'   => __( 'Step description will show up here if any', 'give' ),
		'fields' => [
			[
				'id'         => 'header_label',
				'name'       => __( 'Header Label', 'give' ),
				'desc'       => __( 'Do you want to customize the header label for the payment information step? We recommend keeping it to no more than 5 words as a best practive.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'Add Your Information', 'give' ),
				],
				'default'    => __( 'Add Your Information', 'give' ),
			],
			[
				'id'         => 'headline',
				'name'       => __( 'Headline', 'give' ),
				'desc'       => __( 'Do you want to customize the headline for the checkout step? We recommend keeping it to no more than 8 words as a best practive.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'Tell us a bit about yourself.', 'give' ),
				],
				'default'    => __( 'Tell us a bit about yourself.', 'give' ),
			],
			[
				'id'         => 'description',
				'name'       => __( 'Description', 'give' ),
				'desc'       => __( 'Do you want to customize the description for the checkout step? The description displays below the headline. We recommend keeping it to 1-2 short sentences.', 'give' ),
				'type'       => 'textarea',
				'attributes' => [
					'placeholder' => __( 'We’ll never share this information with anyone.', 'give' ),
				],
				'default'    => __( 'We’ll never share this information with anyone.', 'give' ),
			],
			Options::getCheckoutLabelField(),
		],
	],
	'thank-you'           => [
		'name'   => __( 'Thank You', 'give' ),
		'desc'   => __( 'Step description will show up here if any', 'give' ),
		'fields' => [
			[
				'id'   => 'image',
				'name' => __( 'Image', 'give' ),
				'desc' => __( 'This image appears above the main thank you content. It should be something that reaffirms successful donation like a checkmark or heart. We recommend keeping it square in size at 120x120 pixels for best results.', 'give' ),
				'type' => 'file',
			],
			[
				'id'         => 'headline',
				'name'       => __( 'Headline', 'give' ),
				'desc'       => __( 'This message should be short and sweet. Make the donor feel good about their donation so they continue to give in the future. This text is required and you may use any of the available template tags within this message.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'A great big thank you!', 'give' ),
				],
				'default'    => __( 'A great big thank you!', 'give' ),
			],
			[
				'id'         => 'description',
				'name'       => __( 'Description', 'give' ),
				'desc'       => __( 'The description is displayed directly below the main headline and should be 1-2 sentences for best performance. You may use any of the available template tags within this message.', 'give' ),
				'type'       => 'textarea',
				'attributes' => [
					'placeholder' => __( '{name}, you contribution means a lot and will be put to good use making a difference. We’ve sent your donation receipt to {donor_email}. ', 'give' ),
				],
				'default'    => __( '{name}, you contribution means a lot and will be put to good use making a difference. We’ve sent your donation receipt to {donor_email}. ', 'give' ),
			],
			[
				'name'    => __( 'Enable Social Sharing', 'give' ),
				'desc'    => __( 'Should the thank you page include a social sharing section?', 'give' ),
				'id'      => 'sharing',
				'type'    => 'radio_inline',
				'options' => [
					'enabled'  => __( 'Enabled', 'give' ),
					'disabled' => __( 'Disabled', 'give' ),
				],
				'default' => 'disabled',
			],
			[
				'id'         => 'sharing_instruction',
				'name'       => __( 'Sharing Instruction', 'give' ),
				'desc'       => __( 'Do you want to customize the sharing instructions for this form? The instruction note displays above the social sharing buttons. We recommend keeping it to 1-2 short sentences.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'Tell the world about your generosity and help spread the word!', 'give' ),
				],
				'default'    => __( 'Tell the world about your generosity and help spread the word!', 'give' ),
			],
			[
				'id'         => 'twitter_message',
				'name'       => __( 'Twitter Message', 'give' ),
				'desc'       => __( 'Do you want to customize the default tweet? This text pre-fills a user\'s tweet when they choose to share to Twitter. We recommend keeping it to 1-2 short sentences.', 'give' ),
				'type'       => 'text',
				'attributes' => [
					'placeholder' => __( 'Help me raise money for this great cause!', 'give' ),
				],
				'default'    => __( 'Help me raise money for this great cause!', 'give' ),
			],
		],
	],
];
