<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function View_form()
    {
        return view('sms_form');
    }

    public function generate_qr(Request $request)
    {

        $cp = $request->input('cpnumber');
        $message = $request->input('message');

        $localhost = 'http://127.0.0.1:8000/generate_qr/';
        $url = $localhost  . $cp . '/' . urlencode($message);
        return redirect($url);

    }

    public function qr($cp, $message)
    {   $this->send_sms($cp, urldecode($message));
        return view('sms_form')->with('cp', $cp)->with('message', $message);
    }



    public function send_sms($cp, $message)
    {

        $ch = curl_init();
        $parameters = array(
            'apikey' => '0e35828ae67173b8fcd57c66b9470183', //Your API KEY
            'number' => $cp,
            'message' => $message,
            'sendername' => 'TLCSms'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);

        //Show the server response
        echo $output;
    }


}
