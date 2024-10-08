<?php

use Stripe\Event;

require '../vendor/autoload.php';


$payload = @file_get_contents('php://input');
$event = null;

file_put_contents('log-payload.response.txt', $payload);

try {
    $event = Event::constructFrom(
        json_decode($payload, true)
    );
} catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    exit();
}

// Handle the event
switch ($event->type) {
    case 'payment_intent.succeeded':
        $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent

        file_put_contents('log-payment_intent.succeeded.txt', $event);

        // Then define and call a method to handle the successful payment intent.
        // handlePaymentIntentSucceeded($paymentIntent);
        break;
    case 'charge.succeeded':
        $charge = $event->data->object; // contains a \Stripe\PaymentIntent

        file_put_contents('log-charge.succeeded.txt', $event->data->object);

        // Then define and call a method to handle the successful payment intent.
        // handlePaymentIntentSucceeded($paymentIntent);
        break;
    case 'payment_method.attached':
        $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
        // Then define and call a method to handle the successful attachment of a PaymentMethod.
        // handlePaymentMethodAttached($paymentMethod);
        break;
    // ... handle other event types
    default:
        echo 'Received unknown event type ' . $event->type;
}

http_response_code(200);