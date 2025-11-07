<?php

if (!function_exists('numberToRupiah')) {
    function numberToRupiah($angka) {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('rupiahToNumber')) {
    function rupiahToNumber($rupiah) {
        $angka = str_replace(['Rp', '.', ' '], '', $rupiah);
        return (int)$angka;
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
    }
}

if (!function_exists('get_token')) {
    function get_token() {
        return bin2hex(random_bytes(16));
    }
}

if (!function_exists('send_msg_telegram')) {
    function send_msg_telegram($message) {
        $bot_token = '8576904437:AAHI6ehBhrCuQUhoadIvix7UaeR_d1DZR1U';
        $chat_id = '6877179842';
        $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
        $data = ['chat_id' => $chat_id, 'text' => $message];
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result ? true : false;
    }
}
