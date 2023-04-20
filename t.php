<?php
include "cron.php";


function end_cron() //This function is executed when your cron is stopped
{
    echo "end";
}

function cron_log() //This function is executed when an http request is sent to your url
{
    echo "log";
}



$requedst_url = "http://localhost/opne%20source/cron%20job/test.php";
$period = 1;
$address_cron_page = "http://localhost/opne%20source/cron%20job/t.php";

/*
function construct :
    parameter one (int) : The period you want the http request to be sent (Based on sec)
    parameter two (string) : The address of the page where you use the Cron class  
*/
$cron = new Cron($period, $address_cron_page);//step 1 : create class 



/*
function set_continue_condition :
    parameter one (bool) : 
*/
$cron->set_continue_condition(false);//step 2 : set condition for stop or continue cron



/*
function set_continue_condition : bool
    parameter one (string) : The address of the page you want to send an http request to (Default : null)
    parameter two (array | string) : The parameter you want to send to the page with the post method (Default : null)
    parameter tree (array) : The headers you want to send to the page (Default : null)
    parameter four (array) : user agent  (Default : null)
*/
$check = $cron->create($requedst_url);//step 3 : set condition for stop or continue cron

if($check === false)
{
    end_cron();
}
else
{
    cron_log();
}













