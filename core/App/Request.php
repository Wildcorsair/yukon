<?php
namespace Yukon\Core\App;

use Yukon\Core\Contracts\HTTPRequest;

class Request implements HTTPRequest
{
    private $headers = [];

    public function __construct()
    {
        $this->getHeaders();
        $this->getParameters();
    }

    /**
     * Method gets headers from request and puts they into the private
     * 'headers' property.
     *
     * Default Params:
     *      'Accept',
     *      'Cache-Control',
     *      'Origin',
     *      'User-Agent',
     *      'Host',
     *      'Connection',
     *      'Content-Length',
     *      'Content-Type',
     *      'Accept-Encoding',
     *      'Accept-Language'
     */
    private function getHeaders()
    {

        if(!function_exists('getallheaders')) {
            foreach($_SERVER as $name => $value) {
                if(substr($name, 0, 5) == 'HTTP_') {
                    $this->headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
        } else {
          foreach (getallheaders() as $name => $value) {
              $this->headers[$name] = $value;
          }
        }

      return $this->headers;
    }

    private function getParameters()
    {
        // Get parameters from global $_GET array.
        if (isset($_GET) && !empty($_GET)) {
            $parameters = $_GET;
        }

        // Get parameters from global $_POST array.
        if (isset($_POST) && !empty($_POST)) {
            $parameters = $_POST;
        }

        // Get parameters from the php://input when Content-Type is 'json' string.
        if ($this->headers('Content-Type') == 'application/json') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (!empty($data)) {
                $parameters = $data;
            }
        }

        if (isset($parameters) && !empty($parameters) && is_array($parameters)) {
            foreach ($parameters as $key => $value) {
                $this->$key = trim(htmlspecialchars(stripslashes($value)));
            }
        }
    }

    public function headers($name)
    {
        if (isset($this->headers[$name])) {
            return $this->headers[$name];
        }

        return false;
    }

    public function get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return false;
    }

}
