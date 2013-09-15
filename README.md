Paymill Platform for Symfony Payment Suite
-----

[![Payment Suite](http://origin-shields-io.herokuapp.com/payment/suite.png?color=yellow)](https://github.com/mmoreram/PaymentCoreBundle)  [![Payment Suite](http://origin-shields-io.herokuapp.com/Still/maintained.png?color=green)]()  [![Build Status](https://travis-ci.org/mmoreram/PaymillBundle.png?branch=master)](https://travis-ci.org/mmoreram/PaymillBundle)  [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/mmoreram/PaymillBundle/badges/quality-score.png?s=561838fdedd54e5d4c05036b8ef46b0bca4b3c48)](https://scrutinizer-ci.com/g/mmoreram/PaymillBundle/)

> Info. This Bundle is currently in progress and tested.  
> If you are interested in using this bundle, please star it and will recieve last notices.  
> All help will be very grateful.  
> I am at your disposal.  
>   
> [@mmoreram](https://github.com/mmoreram)

Table of contents
-----

1.  [About Paymill Bundle](#about-payment-suite)
2.  [Installing PaymillBundle](#installing-paymillbundle)
3.  [Configuration](#configuration)
4.  [Router](#router)
5.  [Display](#display)
6.  [Customize](#customize)
7.  [Contribute](#contribute)

# About Paymill Bundle

Implementation of Paymill payment method for Symfony2 Payment Suite.  Is built following PaymentCore specifications and working with defined events

# Installing [PaymillBundle](https://github.com/mmoreram/PaymillBundle)

You have to add require line into you composer.json file

    "require": {
        "php": ">=5.3.3",
        "symfony/symfony": "2.3.*",
        ...
        "mmoreram/paymill-bundle": "dev-master"
    },

Then you have to use composer to update your project dependencies

    php composer.phar update

And register the bundle in your appkernel.php file

    return array(
        // ...
        new Mmoreram\PaymentCoreBundle\PaymentCoreBundle(),
        new Mmoreram\PaymillBundle\PaymillBundle(),
        // ...
    );

# Configuration

Configure the PaymillBundle configuration in your `config.yml`

    paymill:

        # paymill keys
        public_key: XXXXXXXXXXXX
        private_key: XXXXXXXXXXXX

        # By default, controller route is /payment/paymill/execute
        controller_route: /my/custom/route

        # Currency value. By default EUR
        currency: EUR

        # Configuration for payment success redirection
        #
        # Route defines which route will redirect if payment successes
        # If order_append is true, Bundle will append cart identifier into route
        #    taking order_append_field value as parameter name and
        #    PaymentOrderWrapper->getOrderId() value
        payment_success:
            route: cart_thanks
            order_append: true
            order_append_field: order_id

        # Configuration for payment fail redirection
        #
        # Route defines which route will redirect if payment fails
        # If cart_append is true, Bundle will append cart identifier into route
        #    taking cart_append_field value as parameter name and
        #    PaymentCartWrapper->getCartId() value
        payment_fail:
            route: cart_view
            cart_append: false
            cart_append_field: cart_id

# Router

PaymillBundle allows developer to specify the route of controller where paymill payment is processed.  
By default, this value is `/payment/paymill/execute` but this value can be changed in configuration file.  
Anyway, the bundle routes must be parsed by the framework, so these lines must be included into routing.yml file  

    paymill_payment_routes:
        resource: .
        type: paymill

# Display

Once your Paymill is installed and well configured, you need to place your payment form.  

PaymillBundle gives you all form view as requested by the payment module.

    {% block content %}

            <div class="payment-wrapper">

                {{ paymill_render() }}

            </div>

    {% endblock content %}

    {% block foot_script %}

        {{ parent() }}

        {{ paymill_scripts() }}

    {% endblock foot_script %}

`paymill_scripts()` first parameter is currency value. By default, this bundle will use currency defined in configuration, but if is set in this method, will use this one.

    {% block foot_script %}

        {{ parent() }}

        {{ paymill_scripts('USD') }}

    {% endblock foot_script %}

# Customize

`paymill_render()` only print form in a simple way.  

As every project need its own form design, you should overwrite in `app/Resources/PaymillBundle/views/Paymill/view.html.twig`, paymill form render template placed in `Mmoreram/Paymill/Bundle/Resources/views/Paymill/view.html.twig`.


Contribute
-----

All code is Symfony2 Code formatted, so every pull request must validate phpcs standards.  
You should read [Symfony2 coding standards](http://symfony.com/doc/current/contributing/code/standards.html) and install [this](https://github.com/opensky/Symfony2-coding-standard) CodeSniffer to check all code is validated.  

There is also a policy for contributing to this project. All pull request must be all explained step by step, to make us more understandable and easier to merge pull request. All new features must be tested with PHPUnit.