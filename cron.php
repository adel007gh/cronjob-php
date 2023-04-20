<?php

set_time_limit(0);

class Cron
{
    private $continue_condition;
    private $period;
    private $cron_url;

    public function __construct($period,$cron_url)
    {
        $this->continue_condition = true;
        $this->period = $period;
        $this->cron_url = $cron_url;
    }


    public function set_continue_condition($bool)
    {
        $this->continue_condition = $bool;
    }


    private function check_continue()
    {
        $bool = $this->continue_condition;

        if(!is_bool($bool))
        echo "error";

        if(!$bool == true)
        {
            return false;
        }
        return true;
    }

    public function create($url,$parameter=null,$headers=null,$user_agent=null)
    {
        if(!$this->check_continue() == true)
        return false;

        $this->curl_url($url,$parameter,$headers,$user_agent);

        sleep($this->period);
        $this->curl_url($this->cron_url);

        return true;
    }

    private function curl_url($url,$parameter=null,$headers=null,$user_agent=null)
    {
        $curl = curl_init();     

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt ($curl, CURLOPT_POST, TRUE);
        
        if(!is_null($parameter))
        {
            if(is_array($parameter)) $parameter = json_encode($parameter);
            else if(!is_string($parameter)) $parameter = "The type of data sent is wrong. Allowed data are array and string";
            curl_setopt ($curl, CURLOPT_POSTFIELDS, $parameter); 
        }

        if(!is_null($user_agent))
        {
            if(!is_string($user_agent))
            $user_agent = "The type of user_agent sent is wrong. Allowed data are string";
            curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
        }

        if(!is_null($headers))
        {
            if(!is_array($headers))
            $headers = ["error : The type of user_agent sent is wrong. Allowed data are array"];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_TIMEOUT, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 100); 
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);

        curl_exec($curl);   
    
        curl_close($curl);  
    }

   
    
}