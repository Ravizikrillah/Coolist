<?php 

namespace Sakadigital\Api;


class Api {

	/**
	 * Status codes translation table.
	 *
	 * The list of codes is complete according to the
	 * {@link http://www.iana.org/assignments/http-status-codes/ Hypertext Transfer Protocol (HTTP) Status Code Registry}
	 * (last updated 2012-02-13).
	 *
	 * Unless otherwise noted, the status code is defined in RFC2616.
	 *
	 * @var array
	 */
	public $statusTexts = array(
	    100 => 'Continue',
	    101 => 'Switching Protocols',
	    102 => 'Processing',            // RFC2518
	    200 => 'OK',
	    201 => 'Created',
	    202 => 'Accepted',
	    203 => 'Non-Authoritative Information',
	    204 => 'No Content',
	    205 => 'Reset Content',
	    206 => 'Partial Content',
	    207 => 'Multi-Status',          // RFC4918
	    208 => 'Already Reported',      // RFC5842
	    226 => 'IM Used',               // RFC3229
	    300 => 'Multiple Choices',
	    301 => 'Moved Permanently',
	    302 => 'Found',
	    303 => 'See Other',
	    304 => 'Not Modified',
	    305 => 'Use Proxy',
	    306 => 'Reserved',
	    307 => 'Temporary Redirect',
	    308 => 'Permanent Redirect',    // RFC7238
	    400 => 'Bad Request',
	    401 => 'Unauthorized',
	    402 => 'Payment Required',
	    403 => 'Forbidden',
	    404 => 'Not Found',
	    405 => 'Method Not Allowed',
	    406 => 'Not Acceptable',
	    407 => 'Proxy Authentication Required',
	    408 => 'Request Timeout',
	    409 => 'Conflict',
	    410 => 'Gone',
	    411 => 'Length Required',
	    412 => 'Precondition Failed',
	    413 => 'Request Entity Too Large',
	    414 => 'Request-URI Too Long',
	    415 => 'Unsupported Media Type',
	    416 => 'Requested Range Not Satisfiable',
	    417 => 'Expectation Failed',
	    418 => 'I\'m a teapot',                                               // RFC2324
	    422 => 'Unprocessable Entity',                                        // RFC4918
	    423 => 'Locked',                                                      // RFC4918
	    424 => 'Failed Dependency',                                           // RFC4918
	    425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
	    426 => 'Upgrade Required',                                            // RFC2817
	    428 => 'Precondition Required',                                       // RFC6585
	    429 => 'Too Many Requests',                                           // RFC6585
	    431 => 'Request Header Fields Too Large',                             // RFC6585
	    500 => 'Internal Server Error',
	    501 => 'Not Implemented',
	    502 => 'Bad Gateway',
	    503 => 'Service Unavailable',
	    504 => 'Gateway Timeout',
	    505 => 'HTTP Version Not Supported',
	    506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
	    507 => 'Insufficient Storage',                                        // RFC4918
	    508 => 'Loop Detected',                                               // RFC5842
	    510 => 'Not Extended',                                                // RFC2774
	    511 => 'Network Authentication Required',                             // RFC6585
	);

	// AQID: ADDING CUSTOM DATA FOR EXTRA REQUESTS
	protected function responseJson($message = NULL, $data = NULL, $success, $code=200) {
		return response()->json(array(
				'success'	=> $success,
				'data'		=> $data,
				'message'	=> $message,
			))->setStatusCode($code);
	}
	
	public static function responseSuccess($message = NULL, $data = NULL, $code=200)
	{
		$instance = new Api;
		return $instance->responseJson($message, $data, true, $code);
	}

	public static function responseFailed($message = NULL, $data = NULL, $code=400)
	{
		$instance = new Api;
		return $instance->responseJson($message, $data, false, $code);
	}

	public static function generateToken()
	{
		return str_random(64);
	}

	public static function getStatusCodeMessage($code)
	{
		$instance = new Api;
		$statusTextsList = $instance->statusTexts;
		return $statusTextsList[$code];
	}
}