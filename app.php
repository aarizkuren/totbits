<?php
/*
 * @author Asier Arizkuren <asier@arizkuren.net>
 */

class TotbitsWebService {
    protected $url = 'http://www.totbits.com/validate_user.php?user=%s&pwd=%s';

    protected $user;
    protected $pwd;

    /**
     * @param string $user
     * @param string $pwd
     */
    public function __construct($user, $pwd)
    {
        $this->user = urlencode($user);
        $this->pwd = urlencode($pwd);
    }

    /**
     * Execs the login process on web service
     *
     * @return bool
     */
    public function login()
    {
        $request = curl_init();
        curl_setopt_array($request, array(
            CURLOPT_URL => sprintf($this->url, $this->user, $this->pwd),
            CURLOPT_RETURNTRANSFER => true
        ));

        $response = curl_exec($request);
        curl_close($request);

        return ($response === 'ok');
    }
}


$user = $_POST['user'];
$pwd = $_POST['pwd'];

$webService = new TotbitsWebService($user, $pwd);

$logged = $webService->login();

if (!$logged) {
    http_response_code(401);
}
