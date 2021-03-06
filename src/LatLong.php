<?php

namespace itssonu;

// use vendor\simple_html_dom;

class LatLong
{
    private $name;

    public function __construct($name = 'World')
    {
        require_once('vendor/simple_html_dom.php');
    }

    public function getLatLong($address, $type = null)
    {
        $address = str_replace(" ", "+", $address);
        $url = 'https://www.google.co.in/maps/search/' . $address;

        $html = file_get_html($url);

        // ini_set('memory_limit', '-1');
        // $link = $html->find('script',0);

        // print_r($link);
        $dom = new \domDocument;
        // load the html into the object
        $dom->loadHTML($html);
        // keep white space
        $dom->preserveWhiteSpace = true;
        // nicely format output
        $dom->formatOutput   = true;
        //get element by tag name
        $htmlRootElement = $dom->getElementsByTagName('html');
        $str =  htmlspecialchars($dom->saveHTML(), ENT_QUOTES);


        $substring = $this->string_between_two_string($str, '/@', '/data');

        $latlong = (explode(",", $substring));

        if (!preg_match("/^[0-9.]+$/i", $latlong[0])) {
            $substring = $this->string_between_two_string($str, 'https://www.google.co.in/maps/preview/', '/data');

            $arr = explode('/@', $substring);

            if (empty($arr[1])) {
                if ($type == "lat") {
                    return null;
                } elseif ($type == "long") {
                    return null;
                }
                else{
                    $result = new \stdClass;
                    $result->lat = null;
                    $result->long = null;
                    return $result;
                }
                // $return = array('result' => "Address not found! ,Please try again.", 'code' => 204);
                // exit(json_encode($return));
            }
            $substring = $arr[1];

            $latlong = (explode(",", $substring));

            if (!preg_match("/^[0-9.]+$/i", $latlong[0])) {
                if ($type == "lat") {
                    return null;
                } elseif ($type == "long") {
                    return null;
                }
                else{
                    $result = new \stdClass;
                    $result->lat = null;
                    $result->long = null;
                    return $result;
                }
                // $return = array('result' => "Address not found! ,Please try again.", 'code' => 204);
                // exit(json_encode($return));
            }
        }




        if (empty($latlong[0]) || empty($latlong[0])) {
            if ($type == "lat") {
                return null;
            } elseif ($type == "long") {
                return null;
            }
            else{
                $result = new \stdClass;
                $result->lat = null;
                $result->long = null;
                return $result;
            }
            // $return = array('result' => "Address not found! ,Please try again.", 'code' => 204);
            // exit(json_encode($return));
        }

        if ($type == "lat") {
            return $latlong[0];
        } elseif ($type == "long") {
            return $latlong[1];
        }
        else{
            $result = new \stdClass;
            $result->lat = $latlong[0];
            $result->long = $latlong[1];
            return $result;
        }
        // echo "Latitude : ".$latlong[0]."   Longitude : ".$latlong[1];
        // $result = array('lat' => $latlong[0], 'long' => $latlong[1]);
        // // $return = array('result'=>$result,'code'=>200);
        // $return = json_encode($result, true);

        // return $return;
    }

    function string_between_two_string($str, $starting_word, $ending_word)
    {
        $subtring_start = strpos($str, $starting_word);
        //Adding the strating index of the strating word to 
        //its length would give its ending index 
        $subtring_start += strlen($starting_word);
        //Length of our required sub string 
        $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
        // Return the substring from the index substring_start of length size 
        return substr($str, $subtring_start, $size);
    }

    public function getLat($address, $type = "lat")
    {
        return $this->getLatLong($address, $type = "lat");
    }

    public function getLong($address, $type = "long")
    {
        return $this->getLatLong($address, $type = "long");
    }
}
