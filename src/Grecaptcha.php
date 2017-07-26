<?php

namespace Mmilidoni\Grecaptcha;

use Config;

class Grecaptcha {

	public function check(\Illuminate\Http\Request $request) {
		$gRecaptchaResponse = $request->input('g-recaptcha-response');
		$secret = Config::get("services.grecaptcha.secret");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
			"secret=$secret&response=$gRecaptchaResponse");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec ($ch);
		curl_close($ch);

		return !empty(json_decode($server_output)->success);
	}
}

?>
