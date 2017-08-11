<?php
    require "twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;
    $CONSUMER_KEY="sHrOs9rYWPTRD9RqWcFr14ARj";
    $CONSUMER_SECRET="FsG0gnSue8vV5tK3zZLhISUnsftCDDmCkvrzLquCzGcm7Xpjar";
    $access_token="803388227562262528-efSjcZAgeiWQIfTwolyvaLF8f47dsyD";
    $access_token_secret="H0EjVMObMQ1cBbHProD5IE3b2ZY4B33dLEAOmN3E0uJ6y";
;
    $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");
    $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);
    foreach ($statuses as $tweet)
    {
        
        if (($tweet->favorite_count)>=2){
            $status = $statuses = $connection->get("statuses/oembed",["id"=> $tweet->id]);
            echo $status->html;
        }
    }
  
    

?>