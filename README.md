I was working on projects developed in php language (php without framework) and faced a challenge where we had to iterate a php page over a period of time. For example, a page that checks if the database is working properly should run every 10 minutes. I wrote a simple but useful code for this and uploaded it for you to use if you have the same problem as me.
There are 3 php files in this repository

In general, this piece of code takes three parameters from you

1_The address of a web page

2_Alternation period

3_ Continuation condition

and at the output it creates a process that sends http requests to your web page as long as the condition is met.


You can also send a header and a data along with the http request

The t.php file is a test file that periodically executes the test.php file using the Cron class located in the cron.php file.

You can load the cron.php file in your project and call it on the page you want to use.

And use this class like the t.php file


I will be happy to help improve the project

Email:adel007.gholami@gmail.com