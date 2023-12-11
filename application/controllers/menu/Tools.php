<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property M_anggaran $M_anggaran
 */
// Tools.php

class Tools extends CI_Controller
{
    public function index()
    {
        // $this->load->library('curl_library');

        // URL API Exchange Rate
        $req_url = 'https://v6.exchangerate-api.com/v6/a199b9bce34eaae04b061e14/latest/IDR';
        $response_json = file_get_contents($req_url);

        // Check if response is successful
        if (false !== $response_json) {
            // Decode the JSON response
            $response = json_decode($response_json);

            // Check for success
            if ('success' === $response->result) {
                // Get the exchange rate for IDR
                $idr_exchange_rate = $response->conversion_rates->IDR;
            }
        }

        $data = [
            'idr_exchange_rate' => isset($idr_exchange_rate) ? $idr_exchange_rate : null,
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tools', $data);
        $this->load->view('templates/footer');
    }

    public function convertCurrency()
    {
        $amount = $this->input->post('amount');
        $from_currency = $this->input->post('from_currency');
        $to_currency = $this->input->post('to_currency');

        // URL API Exchange Rate
        $req_url = "https://v6.exchangerate-api.com/v6/a199b9bce34eaae04b061e14/latest/$from_currency";
        $response_json = file_get_contents($req_url);

        // Check if response is successful
        if (false !== $response_json) {
            // Decode the JSON response
            $response = json_decode($response_json);

            // Check for success
            if ('success' === $response->result) {
                // Get the exchange rate for the selected currency
                $conversion_rate = $response->conversion_rates->$to_currency;

                // Convert the amount
                $converted_amount = round(($amount * $conversion_rate), 2);

                // Load the view with the result
                $data = [
                    'conversion_rate' => $conversion_rate,
                    'converted_amount' => $converted_amount,
                    'to_currency' => $to_currency,
                ];

                $html = $this->load->view('tools_result', $data, true);
                echo $html; // Kirim hasil konversi dalam bentuk HTML
            }
        }
    }
    public function calculateIndonesianTax()
{
    $income = $this->input->post('income');

    // Hitung pajak sesuai tarif pajak progresif Indonesia
    $tax = $this->calculateIndonesianTaxRate($income);

    // Tampilkan hasil perhitungan pajak
    $data = [
        'income' => $income,
        'tax' => $tax,
    ];

    $html = $this->load->view('tools_result2', $data, true);
    echo $html; // Kirim hasil perhitungan pajak dalam bentuk HTML
}


    private function calculateIndonesianTaxRate($income)
    {
        // Logika perhitungan pajak progresif Indonesia
        // Sesuaikan dengan tarif pajak yang berlaku

        // Contoh: Tarif pajak progresif Indonesia
        if ($income <= 50000000) {
            return $income * 0.05;
        } elseif ($income <= 250000000) {
            return ($income - 50000000) * 0.15 + 2500000;
        } else {
            return ($income - 250000000) * 0.25 + 32500000;
        }
    }
    
//     public function gold()
// {
//     $api_url = 'https://www.goldapi.io/api/XAU/USD';
//     $api_token = 'goldapi-3s6wmorlq0k7hpg-io';

//     $ch = curl_init($api_url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'x-access-token: ' . $api_token,
//     ]);
//     $response_json = curl_exec($ch);

//     if ($response_json === false) {
//         echo "cURL Error: " . curl_error($ch);
//     } else {
//         $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//         echo "HTTP Status: " . $http_status . PHP_EOL;

//         if ($http_status === 200) {
//             // Data retrieved successfully
//             $goldData = json_decode($response_json, true);

//             // Pass the gold data to the view
//             $data['goldData'] = $goldData;

//             // Load the view
//             $this->load->view('tools', $data);
//         } else {
//             echo "Failed to retrieve Gold API data. Response: " . $response_json;
//         }
//     }

//     curl_close($ch);
// }
}
// public function getGoldPrice()
// {
//     $api_url = 'https://www.goldapi.io/api/XAU/USD';
//     $api_key = 'goldapi-3s6wmorlq0k7hpg-io';

//     $ch = curl_init($api_url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-access-token: ' . $api_key]);
//     $response_json = curl_exec($ch);
//     curl_close($ch);

//     if ($response_json !== false) {
//         $goldData = json_decode($response_json, true);
//         $goldPrice = $goldData['price'];

//         // Load the view and pass the gold price as data
//         $view_data['goldPrice'] = $goldPrice;
//         $this->load->view('tools', $view_data);

//         // You can do further processing or return the gold price as needed
//     } else {
//         return 'Failed to retrieve Gold API data.';
//     }
// }

// }

