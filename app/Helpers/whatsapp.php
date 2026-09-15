<?php

if (!function_exists('whatsapp_booking_url')) {
    function whatsapp_booking_url(string $service, string $duration, string $date, string $time, string $location): string
    {
        $message = sprintf(
            "Hello %s,\n\nI would like to book:\n\nMassage: %s\nDuration: %s\nPreferred date: %s\nPreferred time: %s\nLocation: %s",
            config('moly.business.name', 'MOLLY KL HOME MASSAGE'),
            $service,
            $duration,
            $date,
            $time,
            $location
        );

        $number = config('moly.business.whatsapp', '');
        $encodedMessage = urlencode($message);

        return "https://wa.me/{$number}?text={$encodedMessage}";
    }
}

if (!function_exists('whatsapp_contact_url')) {
    function whatsapp_contact_url(?string $message = null): string
    {
        $defaultMessage = 'Hello ' . config('moly.business.name', 'MOLLY KL HOME MASSAGE') . ', I would like to make an enquiry.';
        $msg = $message ?? $defaultMessage;

        $number = config('moly.business.whatsapp', '');
        $encodedMessage = urlencode($msg);

        return "https://wa.me/{$number}?text={$encodedMessage}";
    }
}

if (!function_exists('whatsapp_number_formatted')) {
    function whatsapp_number_formatted(): string
    {
        $number = config('moly.business.whatsapp', '');
        if (empty($number)) {
            return '';
        }
        if (str_starts_with($number, '60')) {
            $rest = substr($number, 2);
            return '+60 ' . $rest;
        }
        return '+' . $number;
    }
}
