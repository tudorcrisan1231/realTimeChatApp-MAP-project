<?php
use Carbon\Carbon;

function timePassed($time){
    if(!$time) return '-';

    $targetDate = Carbon::parse($time);
    $currentTime = Carbon::now();


    if($targetDate->diffInDays($currentTime) > 0){
        return $targetDate->diffInDays($currentTime).' days ago';
    }else if($targetDate->diffInHours($currentTime) > 0){
        return $targetDate->diffInHours($currentTime).' hours ago';
    }else if($targetDate->diffInMinutes($currentTime) > 0){
        return $targetDate->diffInMinutes($currentTime).' minutes ago';
    }else if($targetDate->diffInSeconds($currentTime) > 0){
        return $targetDate->diffInSeconds($currentTime).' seconds ago';
    }else{
        return 'just now';
    }

}