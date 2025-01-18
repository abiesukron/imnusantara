<?php

namespace AbieSoft\AsetCode\Package;

use AbieSoft\AsetCode\Utilities\Config;

class Youtube
{

    public static $_numkey = 0;
    protected static $_key = "";

    protected static function getCurl($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, true);
    }

    public static function key () {
        
        
            if(self::$_numkey == 0){
                self::$_key = 'AIzaSyA6t6S6Qh-BWbKjcgWG52Y__DFr8lkMffQ';
            }else if(self::$_numkey == 1){
                self::$_key = 'AIzaSyBUzs7qHVVvBQ9Noicb2FellepxkfnhZb8';
            }else if(self::$_numkey == 2){
                self::$_key = 'AIzaSyBRmiHOu_3V5tQjCJ6FZ_TYkz3Q73YFGH4';
            }else if(self::$_numkey == 3){
                self::$_key = 'AIzaSyAKFcOA8dFAqPijkwrdeGVVn153Os_-YpU';
            }else if(self::$_numkey == 4){
                self::$_key = 'AIzaSyDbzLRfLbiOYpap1PtxrOQS92Nt65r977k';
            }else if(self::$_numkey == 5){
                self::$_key = 'AIzaSyBNuiO3sT26Z5XqDct2B1NvJRJYSUBmeRQ';
            }else if(self::$_numkey == 6){
                self::$_key = 'AIzaSyA4q5c4lOskVyIUUGYgXYKGarWwxo3pEwc';
            }else if(self::$_numkey == 7){
                self::$_key = 'AIzaSyAu0_olChM4GDSo-H0tvpbIEE3esNZRBZg';
            }else if(self::$_numkey == 8){
                self::$_key = 'AIzaSyCVm-u_7lz_uObe25A_u0-t5fkqxfEzr9w';
            }else if(self::$_numkey == 9){
                self::$_key = 'AIzaSyBjFvEf-M55vR2AD9glxugy6Q8u_ft5rqY';
            }else if(self::$_numkey == 10){
                self::$_key = 'AIzaSyAvwNIgchKR8ZmTqvBW60oMhmc8rbJLt5I';
            }else{
                self::$_numkey = 0;
            }
        
        
        //self::$_key = 'AIzaSyDbzLRfLbiOYpap1PtxrOQS92Nt65r977k';
        
        if(isset(self::getCurl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.Config::envReader('YOUTUBE_ID').'&key='.self::$_key)['items'])) {
            return self::$_key;
        }else{
            self::$_numkey += 1;
            return self::key();
        }
    }

    protected static function result($idChannel) {
        $channelID = Config::envReader($idChannel);
        return self::getCurl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$channelID.'&key='.self::key());
    }

    public static function videoTerbaru($idChannel) {
        $channelID = Config::envReader($idChannel);
        return self::getCurl('https://www.googleapis.com/youtube/v3/search?key='.self::key().'&channelId='.$channelID.'&maxResult=4&order=date&part=snippet')['items'];
    }
    
    public static function pilihan($idChannel) {
        $channelID = Config::envReader($idChannel);
        return self::getCurl('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults=25&key='.self::key())['items'];
    }

    public static function profilePic($idChannel) {
        return self::result($idChannel)['items'][0]['snippet']['thumbnails']['medium']['url'];
    }
    
    public static function namaChannel($idChannel) {
        return self::result($idChannel)['items'][0]['snippet']['title'];
    }

    public static function jumlahSubscriber($idChannel) {
        return self::result($idChannel)['items'][0]['statistics']['subscriberCount'];
    }

    public static function only($idvideo) {
        $taglinechannel = Config::envReader('YOUTUBE_ID');
        $youtubechannel = self::getCurl('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$idvideo.'&key='.self::key())['items'][0]['snippet']['channelId'];
        if($taglinechannel == $youtubechannel){
            $detail = self::getCurl('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$idvideo.'&key='.self::key());
            return $detail;
        }else{
            return self::error();
        }
    }

    public static function detail($idvideo) {
        $taglinechannel = Config::envReader('YOUTUBE_ID');
        $youtubechannel = self::getCurl('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$idvideo.'&key='.self::key())['items'][0]['snippet']['channelId'];
        if($taglinechannel == $youtubechannel){
            $detail = self::getCurl('https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$idvideo.'&key='.self::key());
            return $detail;
        }
    }

    protected static function error() {
        $data = [
            'code' => 404,
            'message' => 'Not Found'
        ];
        echo json_encode($data);
    }

}