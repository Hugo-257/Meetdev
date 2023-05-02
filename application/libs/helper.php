<?php

class Helper
{
    /**
     * debugPDO
     *
     * Shows the emulated SQL query in a PDO statement. What it does is just extremely simple, but powerful:
     * It combines the raw query and the placeholders. For sure not really perfect (as PDO is more complex than just
     * combining raw query and arguments), but it does the job.
     * 
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    static public function debugPDO($raw_sql, $parameters)
    {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);
        
        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */

        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }

    static public function formateDate($date)
    {
        $array = explode("/", $date);
        return $array[2] . "-" . $array[1] . "-" . $array[0];
    }

    static public function formatTime($time)
    {
        $array = explode(" ", $time);
        return $array[0] . ":" . "00";
    }
    static public function getMonthFromDate($date)
    {
        // Convert date to Unix timestamp
        $timestamp = strtotime($date);

        // Get month from timestamp in letter format
        $month = date("F", $timestamp);

        return $month;
    }
    static public function encrypt($value)
    {
        //Encryption key
        $encryption_key = "0eee0419-f91c-4665-8d72-96973eed388a";

        // Cipher method
        $ciphering = "AES-128-CTR";

        $encrypt_def = "de7a1f34-44fbds0";

        $options = 0;

        // Use openssl_encrypt() function to encrypt the data stored for the session
        $encryption = openssl_encrypt(json_encode($value), $ciphering, $encryption_key, $options, $encrypt_def);
        return $encryption;
    }

    static public function decrypt($value)
    {

        //Encryption key
        $encryption_key = "0eee0419-f91c-4665-8d72-96973eed388a";

        // Cipher method
        $ciphering = "AES-128-CTR";

        $encrypt_def = "de7a1f34-44fbds0";

        $options = 0;

        // Use openssl_decrypt() function to decrypt the data stored for the session
        $value = openssl_decrypt($value, $ciphering, $encryption_key, $options, $encrypt_def);
        return json_decode($value, true);
    }


}