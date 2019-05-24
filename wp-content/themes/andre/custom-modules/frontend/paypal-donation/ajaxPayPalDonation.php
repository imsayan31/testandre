<?php

/*
 * --------------------------------------------
 * AJAX:: PayPal Donation
 * --------------------------------------------
 */

add_action('wp_ajax_usr_paypal_donation', 'ajaxPayPalDonation');
add_action('wp_ajax_nopriv_usr_paypal_donation', 'ajaxPayPalDonation');

if (!function_exists('ajaxPayPalDonation')) {

    function ajaxPayPalDonation() {
        $resp_arr = ['flag' => FALSE, 'msg' => '', 'url' => '', 'user_id' => ''];
        $GeneralThemeObject = new GeneralTheme();
        $DonationObject = new classPayPalDonation();
        $msg = NULL;
        $fname = strip_tags(trim($_POST['fname']));
        $lname = strip_tags(trim($_POST['lname']));
        $email = strip_tags(trim($_POST['email']));
        $phone = strip_tags(trim($_POST['phone']));
        $donate_amount = $_POST['donate_amount'];
        $get_paypal_donation_amount = get_option('_payapl_donation_amount');



        if (empty($fname)) {
            $msg = __('Enter your first name.', THEME_TEXTDOMAIN);
        } elseif (!ctype_alpha($fname)) {
            $msg = __('First name only contains alphabets.', THEME_TEXTDOMAIN);
        } elseif (empty($lname)) {
            $msg = __('Enter your last name.', THEME_TEXTDOMAIN);
        } elseif (!ctype_alpha($lname)) {
            $msg = __('Last name only contains alphabets.', THEME_TEXTDOMAIN);
        } elseif (empty($email)) {
            $msg = __('Enter your mail.', THEME_TEXTDOMAIN);
        } else if (!is_email($email)) {
            $msg = __('Email is not in proper format.', THEME_TEXTDOMAIN);
        } elseif (empty($phone)) {
            $msg = __('Enter your phone.', THEME_TEXTDOMAIN);
        } else {

            $donationID = $GeneralThemeObject->generateRandomString(6);

            $donationArgs = [
                'donation_id' => $donationID,
                'name' => $fname . ' ' . $lname,
                'email' => $email,
                'phone' => $phone,
                'amount' => ($donate_amount) ? $donate_amount : $get_paypal_donation_amount,
                'transaction_id' => '',
                'payment_status' => 2,
                'payment_date' => '',
            ];

            $inserted_donation_id = $DonationObject->insertIntoDonation($donationArgs);

            /* paypal data */
            $paypal_data_params = array(
                'no_shipping' => '1',
                'no_note' => '1',
                'item_name' => 'PayPal Donation',
                'currency_code' => 'BRL',
                'amount' => ($donate_amount) ? $donate_amount : $get_paypal_donation_amount,
                'return' => BASE_URL . "/?action=success",
                'cancel_return' => BASE_URL . "/?action=cancel",
                'notify_url' => BASE_URL
            );
            $paypal_data_params['custom'] = $donationID . '#' . '9999999999';

            /* process to paypal */
            $Paypal = new Paypal_Standard();
            $paypalActionUrl = $Paypal->preparePaypalData($paypal_data_params);

            if ($inserted_donation_id) {
                $resp_arr['flag'] = true;
                $msg = __('You are being redirected to payment page.', THEME_TEXTDOMAIN);
            } else {
                $resp_arr['flag'] = true;
                $msg = __('Sorry!!! We can not proceed you to payment page. Please try again later.', THEME_TEXTDOMAIN);
            }
        }
        $resp_arr['msg'] = $msg;
        $resp_arr['url'] = $paypalActionUrl;
        echo json_encode($resp_arr);
        exit;
    }

}