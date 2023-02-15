<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;

class HomeController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty($this->domainUser)) {
            if ( strtotime($this->domainUser->end_at) < time() && ($this->emailUser != 'vn3ctran@gmail.com')) {
                return redirect(route('admin_dateline'));
            }
        }
        return view('site.default.index');
    }
	
	public function webhook(){
		$token = "EAAGwwMRCqwUBAMK21y9t71MWtPTda1y4kcU0mbReR42RPbPDFFeqU83JyniXdrtMxsBklSD5iyap6voYEXIx7MOa2hTwpAOpB9BZAMiY6m6pU7P8sj5V5axlse3RYKd31EyOTpbnEOt3zI9cRHabFh5a4QXEqubyePQeoypr5h26VSHQ5D4m0hCyuEBGPL6HLzB6JmAZDZD";
		// Verify the webhook
		if ($_REQUEST['hub_verify_token'] === $token) {
		  echo $_REQUEST['hub_challenge'];
		  return;
		}

		// Get the incoming message
		$input = json_decode(file_get_contents('php://input'), true);
		$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
		$message = $input['entry'][0]['messaging'][0]['message']['text'];

		// Determine the response
		switch ($message) {
		  case 'hi':
			$response = "Hello! How can I help you today?";
			break;
			case 'hello':
			$response = "Hello! How can I help you today?";
			break;
		  case 'bye':
			$response = "Goodbye! Have a great day.";
			break;
		  default:
			$response = "Sorry, I don't understand what you're saying. Could you try again?";
			break;
		}

		// Send the response
		$response_data = [
			'recipient' => [ 'id' => $sender ],
			'message' => [ 'text' => $response ]
		];
		$access_token = "EAAGwwMRCqwUBAGw3GZBsDxNfeYdTGla45NAFIYqZAQgFpeVe4Yf9ZBKrxfhGt3lnoMVmSGJ2DlZASGTR6ZAIHhs7gKAkZARo8WlOZBbgfOmLCx9U23BmjyJSuLqtC3gZAZBlys3EDARvE31puFlw0RaZCR0ZAZCE6VZAJcTdZCZBo1Oc42GERAx4131WtZAcNFp59pK0PPfUgF2lGuydnLz9vUrBsuGUbM6ZBYcThaJAZD";
		$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response_data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_exec($ch);
		curl_close($ch);

	}
}
