<?php

use App\Models\AppSettings;
use App\Models\Listing;
use App\Models\ListingFiles;
use Carbon\Carbon;
use App\Models\User;
use App\Notifications\ADMDbNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

/**
 * Admin Dashborad Data
 */

// if(!function_exists("admin_dash")){
//     function admin_dash(){
//       $user = User::where('role', 0)->get();
//       $total_visit = webViews::select(DB::raw("(SUM(hits)) as count") //,DB::raw("DAYNAME(created_at) as dayname")
//       )
//       ->whereDate('created_at', Carbon::today())
//      ->whereYear('created_at', date('Y'))
//      ->get()->toArray()[0]['count'];

//      $total_post = Post::all()->count();

//      $totalUsersWeek = webViews::select(DB::raw("(SUM(hits)) as count") //,DB::raw("DAYNAME(created_at) as dayname")
//       )
//       ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//      ->whereYear('created_at', date('Y'))
//      ->get()->toArray()[0]['count'];

//      $usersOnMobile = webViews::select(DB::raw("(SUM(hits)) as count") //,DB::raw("DAYNAME(created_at) as dayname")
//       )->where('isMobile', true)
//       ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//      ->whereYear('created_at', date('Y'))
//      ->get()->toArray()[0]['count'];
//         return [
//             'today_visit' => intval($total_visit),
//             'total_posts' => $total_post,
//             'mobile_visit_percent' => percent_two_values(intval($usersOnMobile), intval($totalUsersWeek))
//         ];
//     }
// }

// if(!function_exists("site_socials")){
//     function site_socials(){
//         return BlogSocialMedia::find(1);
//     }
// }

/**
 * DATE FORMAT eg. time ago 
 */
if(!function_exists("time_Ago")){
  function time_Ago($time) {
  
    $time = strtotime($time);
    // Calculate difference between current
    // time and given timestamp in seconds
    $diff     = time() - $time;
      
    // Time difference in seconds
    $sec     = $diff;
      
    // Convert time difference in minutes
    $min     = round($diff / 60 );
      
    // Convert time difference in hours
    $hrs     = round($diff / 3600);
      
    // Convert time difference in days
    $days     = round($diff / 86400 );
      
    // Convert time difference in weeks
    $weeks     = round($diff / 604800);
      
    // Convert time difference in months
    $mnths     = round($diff / 2600640 );
      
    // Convert time difference in years
    $yrs     = round($diff / 31207680 );
      
    // Check for seconds
    if($sec <= 60) {
        echo "$sec sec ago";
    }
      
    // Check for minutes
    else if($min <= 60) {
        if($min==1) {
            echo "one min ago";
        }
        else {
            echo "$min mins ago";
        }
    }
      
    // Check for hours
    else if($hrs <= 24) {
        if($hrs == 1) { 
            echo "an hr ago";
        }
        else {
            echo "$hrs hrs ago";
        }
    }
      
    // Check for days
    else if($days <= 7) {
        if($days == 1) {
            echo "Yesterday";
        }
        else {
            echo "$days days ago";
        }
    }
      
    // Check for weeks
    else if($weeks <= 4.3) {
        if($weeks == 1) {
            echo "a week ago";
        }
        else {
            echo "$weeks weeks ago";
        }
    }
      
    // Check for months
    else if($mnths <= 12) {
        if($mnths == 1) {
            echo "a mth ago";
        }
        else {
            echo "$mnths mths ago";
        }
    }
      
    // Check for years
    else {
        if($yrs == 1) {
            echo "a yr ago";
        }
        else {
            echo "$yrs yrs ago";
        }
    }
}
}

/**
 * GET LATES FILES 
 */
if(!function_exists("getLatestFiles")){
    function getLatestFiles($listing_slug, $amount = 4){
      $listing =  Listing::where('slug', $listing_slug)->first();
      $listingFiles = $listing->files()->orderBy('created_at', 'DESC')->limit($amount)->get();
      return $listingFiles;
    }
}

/**
 * DATE FORMAT eg. January 12, 2023
 */
if(!function_exists("percent_two_values")){
    function percent_two_values($section, $total){
        return round((($section / $total) * 100), 0, PHP_ROUND_HALF_UP);
    }
}

/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if(!function_exists("dbNotify")){
    function dbNotify($title, $message, $type, $user,$icon = '', $is_object = false){
        $data_array = [
            "icon" => $icon,
            'title' => $title,
            'message' => $message,
            'type'=> $type
        ];
        if($is_object){
            foreach ($user as $single_user) {
                Notification::send($single_user, new ADMDbNotification($data_array));
            }
        }else{
           $user->notify((new ADMDbNotification($data_array))->delay(now()->addMinute(1)));
        }
        
        
    }
}

/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if(!function_exists("getUserNotifications")){
    function getUserNotifications($user_id = null){
       $user = auth()->user();
        if(!is_null($user_id)){
      $user =  User::find($user_id);
     }
     return $user->notifications;
        
    }
}


/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if(!function_exists("saveTransaction")){
    function saveTransaction($data, $message, $user = null){
       if ($user == null) {
        $user = User::find(auth()->user()->id);
       }

    //    save transaction in db
      $user->transactions()->firstOrCreate([
        'transaction_id' => $data->id,
    ],[
        'user_id' => $user,
        'transaction_id' => $data->id,
        'message' => (is_null($data->message))? $message : $data->message,
        'paid_for' => $message,
        'status' => $data->status,
        'data' => $data,
    ]);
        
    }
}

/**
 * Get USer Card Details
 */
if(!function_exists("getCardList")){
    function getCardList($user = null){
       if ($user == null) {
        $user = User::find(auth()->user()->id);
       }
       //get card list
       $card_list = $user->payment_methods()->where('channel', 'card')->get();
        return $card_list;
    }
}

// /**
//  * Faq Fetch 
//  */
// if(!function_exists("getFAQ")){
//     function getFAQ($amount = 3){
//         $faq = Faq::where('publish', false)->orderBy('created_at','asc')->limit($amount)->get();
        
//         return  $faq;
//     }
// }

/**
 * DATE FORMAT eg. January 12, 2023
 */

 if(!function_exists('date_formatter')){
    function date_formatter($date){
        return Carbon::createFromFormat("Y-m-d H:i:s", $date)->isoFormat("LL");
    }
 }

 
 
 /**
 * STRIP HTML WORDS
 */
 if(!function_exists('words')){
    function words($value, $words = 15, $end="..."){
        return Str::words(strip_tags($value), $words, $end);
    }
 }



 /**
 * CHECK ONLINE STATUS
 */
 if(!function_exists('isOnline')){
    function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
 }

  /**
 * Reading Article Duration
 */

 if(!function_exists('readDuration')){
    function readDuration(...$text){
       Str::macro('timeCounter', function($text){
        $totalWords = str_word_count(implode(" ", $text));
        $minuitesToRead = round($totalWords/200);
        return (int)max(1, $minuitesToRead);
       });
       return Str::timeCounter($text);
    }
 }

 /**
     * Get all Admin Settings
     * 
     * @param string $column_query The required column to return 
     */

 if(!function_exists('appSetting')){
    function appSetting($column_query){
      $result = AppSettings::select($column_query)->first();
      if($result){
        return $result->$column_query;
      }
    }
 }
 

 /**
     * Get all Admin Settings
     * 
     * @param string $column_query The required column to return 
     */

 if(!function_exists('countFiles')){
  function countFiles($dir){

    if(is_dir($dir)){

      $dir = opendir($dir);
      $i = 0;
      while (false !== ($file = readdir($dir))){
              if (is_dir($file) && !in_array($file, array('.', '..'))){
  
              $i += countFiles($file);
          }else{
              $i++;
          }
        }
        return $i;
    }else{
      return 0;
    }
    }

 }


   /**
     * Get Folder Size
     *
     * @param string $folderPath the path to the specified folder
     */

 if(!function_exists('folderSize')){
  function folderSize($dir){
   if(is_dir($dir)){
    $count_size = 0;
    $count = 0;
    $dir_array = scandir($dir);
      foreach($dir_array as $key=>$filename){
        if($filename!=".." && $filename!="."){
           if(is_dir($dir."/".$filename)){
              $new_foldersize = foldersize($dir."/".$filename);
              $count_size = $count_size+ $new_foldersize;
            }else if(is_file($dir."/".$filename)){
              $count_size = $count_size + filesize($dir."/".$filename);
              $count++;
            }
       }
     }
    return sizeFormat($count_size);
   }else{
    return sizeFormat(0);
   }
    }
 }


   /**
     * format size
     *
     * @param string $bytes bytes toconvert
     */

 if(!function_exists('sizeFormat')){
  function sizeFormat($bytes){ 
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;
    
    if (($bytes >= 0) && ($bytes < $kb)) {
    return $bytes . ' B';
    
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
    return ceil($bytes / $kb) . ' KB';
    
    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
    return ceil($bytes / $mb) . ' MB';
    
    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
    return ceil($bytes / $gb) . ' GB';
    
    } elseif ($bytes >= $tb) {
    return ceil($bytes / $tb) . ' TB';
    } else {
    return $bytes . ' B';
    }
    }
 }

   /**
     * Get Related Listings 
     * [rocket, briefcase, bank, search, pencil, warning, card].
     *
     * @param string $amount the number of related gigs to return
     * @param int $listing_id specified listing_id
     * @param string $category_list the category you wish to get the list from
     */

 if(!function_exists('related_listing')){
    function related_listing($listing_id, $category_list, $amount = 3){
        $category_id_list = [];
        foreach ($category_list->toArray() as $key) {
            $category_id_list[] = $key['id'];
        }
    //   return $category_id_list ;
      $related_listings = Listing::inRandomOrder()->take($amount)->whereHas('categories', function($query) use
      ($category_id_list){
        $query->whereIn('categories_id', $category_id_list);
        })->where('is_active', true)->where('id', '!=', $listing_id)->get();

        return  $related_listings;
    }
 }

   /**
     * Format Money 
     * 1000000 to 1,000,000.
     *
     * @param string $value the number 
     */

 if(!function_exists('formatMoney')){
  function formatMoney($value, $hasAbrv = false)
  {
    if($hasAbrv){
      $abbreviations = array(
        12 => 'T',
        9 => 'B',
        6 => 'M',
        3 => 'K',
    );

    foreach ($abbreviations as $exponent => $abbreviation) {
        if (abs($value) >= pow(10, $exponent)) {
            $formattedAmount = $value / pow(10, $exponent);
            $formattedAmount = number_format($formattedAmount, 1) . $abbreviation;
            return $formattedAmount;
        }
    }

    return number_format($value, 2, '.', ',');
    }else{
      return number_format($value, 2, '.', ',');
    }
      
  }
 }

   /**
     * Percent Calculatory 
     * 
     *
     * @param string $total the number 
     * @param string $value the number 
     */

 if(!function_exists('percentCalc')){
  function percentCalc($value, $total)
  {
      return $percentage = ($value / $total) * 100;
  }
 }
   /**
     * Get Last Seen For User
     *
     * @param integer $user_id The specific user to get the last seen from
     */

 if(!function_exists('get_last_seen')){
    function get_last_seen($user_id){
      $last_seen =  DB::table('sessions')->where('user_id', $user_id) ->orderBy('last_activity', 'desc')
       ->first();
       $timestamp = $last_seen->last_activity; // Replace with your timestamp

       // Create a Carbon instance from the timestamp
       $datetime = Carbon::createFromTimestamp($timestamp);
       
       // Retrieve the formatted date and time
       $date = $datetime->format('D-M-Y'); // Example output: 2022-January-19
       $time = $datetime->format('H:i:s a'); // Example output: 08:51:32
       // Convert the timestamp to "time ago" format
      $timeAgo = $datetime->diffForHumans();

      return $date. '-'. $time. ' ('.$timeAgo.')';
    }
 }

 if(!function_exists('getIcon')){
     /**
     * Return an svg Icon 
     * [rocket, briefcase, bank, search, pencil, warning, card, lock-shield, 'bin , check-square, trophy, cursor, globe, dollar, hour-glass].
     *
     * @param int $type is the specified icon.
     */
    function getIcon($type){
      if($type=="hour-glass"){
        return '<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M12 6.20001V1.20001H2V6.20001C2 6.50001 2.1 6.70001 2.3 6.90001L5.6 10.2L2.3 13.5C2.1 13.7 2 13.9 2 14.2V19.2H12V14.2C12 13.9 11.9 13.7 11.7 13.5L8.4 10.2L11.7 6.90001C11.9 6.70001 12 6.50001 12 6.20001Z" fill="currentColor"/>
        <path d="M13 2.20001H1C0.4 2.20001 0 1.80001 0 1.20001C0 0.600012 0.4 0.200012 1 0.200012H13C13.6 0.200012 14 0.600012 14 1.20001C14 1.80001 13.6 2.20001 13 2.20001ZM13 18.2H10V16.2L7.7 13.9C7.3 13.5 6.7 13.5 6.3 13.9L4 16.2V18.2H1C0.4 18.2 0 18.6 0 19.2C0 19.8 0.4 20.2 1 20.2H13C13.6 20.2 14 19.8 14 19.2C14 18.6 13.6 18.2 13 18.2ZM4.4 6.20001L6.3 8.10001C6.7 8.50001 7.3 8.50001 7.7 8.10001L9.6 6.20001H4.4Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="dollar"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M12.5 22C11.9 22 11.5 21.6 11.5 21V3C11.5 2.4 11.9 2 12.5 2C13.1 2 13.5 2.4 13.5 3V21C13.5 21.6 13.1 22 12.5 22Z" fill="currentColor"/>
        <path d="M17.8 14.7C17.8 15.5 17.6 16.3 17.2 16.9C16.8 17.6 16.2 18.1 15.3 18.4C14.5 18.8 13.5 19 12.4 19C11.1 19 10 18.7 9.10001 18.2C8.50001 17.8 8.00001 17.4 7.60001 16.7C7.20001 16.1 7 15.5 7 14.9C7 14.6 7.09999 14.3 7.29999 14C7.49999 13.8 7.80001 13.6 8.20001 13.6C8.50001 13.6 8.69999 13.7 8.89999 13.9C9.09999 14.1 9.29999 14.4 9.39999 14.7C9.59999 15.1 9.8 15.5 10 15.8C10.2 16.1 10.5 16.3 10.8 16.5C11.2 16.7 11.6 16.8 12.2 16.8C13 16.8 13.7 16.6 14.2 16.2C14.7 15.8 15 15.3 15 14.8C15 14.4 14.9 14 14.6 13.7C14.3 13.4 14 13.2 13.5 13.1C13.1 13 12.5 12.8 11.8 12.6C10.8 12.4 9.99999 12.1 9.39999 11.8C8.69999 11.5 8.19999 11.1 7.79999 10.6C7.39999 10.1 7.20001 9.39998 7.20001 8.59998C7.20001 7.89998 7.39999 7.19998 7.79999 6.59998C8.19999 5.99998 8.80001 5.60005 9.60001 5.30005C10.4 5.00005 11.3 4.80005 12.3 4.80005C13.1 4.80005 13.8 4.89998 14.5 5.09998C15.1 5.29998 15.6 5.60002 16 5.90002C16.4 6.20002 16.7 6.6 16.9 7C17.1 7.4 17.2 7.69998 17.2 8.09998C17.2 8.39998 17.1 8.7 16.9 9C16.7 9.3 16.4 9.40002 16 9.40002C15.7 9.40002 15.4 9.29995 15.3 9.19995C15.2 9.09995 15 8.80002 14.8 8.40002C14.6 7.90002 14.3 7.49995 13.9 7.19995C13.5 6.89995 13 6.80005 12.2 6.80005C11.5 6.80005 10.9 7.00005 10.5 7.30005C10.1 7.60005 9.79999 8.00002 9.79999 8.40002C9.79999 8.70002 9.9 8.89998 10 9.09998C10.1 9.29998 10.4 9.49998 10.6 9.59998C10.8 9.69998 11.1 9.90002 11.4 9.90002C11.7 10 12.1 10.1 12.7 10.3C13.5 10.5 14.2 10.7 14.8 10.9C15.4 11.1 15.9 11.4 16.4 11.7C16.8 12 17.2 12.4 17.4 12.9C17.6 13.4 17.8 14 17.8 14.7Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="globe"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"/>
        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="cursor"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19.4 13.9411L10.7 5.24112C10.4 4.94112 10 4.84104 9.60001 5.04104C9.20001 5.24104 9 5.54107 9 5.94107V18.2411C9 18.6411 9.20001 18.941 9.60001 19.141C9.70001 19.241 9.9 19.2411 10 19.2411C10.2 19.2411 10.4 19.141 10.6 19.041C11.4 18.441 12.1 17.941 12.9 17.541L14.4 21.041C14.6 21.641 15.2 21.9411 15.8 21.9411C16 21.9411 16.2 21.9411 16.4 21.8411C17.2 21.5411 17.5 20.6411 17.2 19.8411L15.7 16.2411C16.7 15.9411 17.7 15.741 18.8 15.541C19.2 15.541 19.5 15.2411 19.6 14.8411C19.8 14.6411 19.7 14.2411 19.4 13.9411Z" fill="currentColor"/>
        <path opacity="0.3" d="M15 6.941C14.8 6.941 14.7 6.94102 14.6 6.84102C14.1 6.64102 13.9 6.04097 14.2 5.54097L15.2 3.54097C15.4 3.04097 16 2.84095 16.5 3.14095C17 3.34095 17.2 3.941 16.9 4.441L15.9 6.441C15.7 6.741 15.4 6.941 15 6.941ZM18.4 9.84102L20.4 8.84102C20.9 8.64102 21.1 8.04097 20.8 7.54097C20.6 7.04097 20 6.84095 19.5 7.14095L17.5 8.14095C17 8.34095 16.8 8.941 17.1 9.441C17.3 9.841 17.6 10.041 18 10.041C18.2 9.94097 18.3 9.94102 18.4 9.84102ZM7.10001 10.941C7.10001 10.341 6.70001 9.941 6.10001 9.941H4C3.4 9.941 3 10.341 3 10.941C3 11.541 3.4 11.941 4 11.941H6.10001C6.70001 11.941 7.10001 11.541 7.10001 10.941ZM4.89999 17.1409L6.89999 16.1409C7.39999 15.9409 7.59999 15.341 7.29999 14.841C7.09999 14.341 6.5 14.141 6 14.441L4 15.441C3.5 15.641 3.30001 16.241 3.60001 16.741C3.80001 17.141 4.1 17.341 4.5 17.341C4.6 17.241 4.79999 17.2409 4.89999 17.1409Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="rocket"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
        <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
        </svg>';
      }

      if($type=="briefcase"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor"/>
            <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor"/>
            <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor"/>
            <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor"/>
            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
            </svg>';
      }
      if($type=="bank"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor"/>
        <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="card"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="search"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="currentColor"/>
        <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="pencil"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="warning"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
        <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
        <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="currentColor"/>
        </svg>';
      }
      if($type=="card"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="lock-shield"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
        <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="bin"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="check-square"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
        <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="star-filled"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.0079 2.6L15.7079 7.2L21.0079 8.4C21.9079 8.6 22.3079 9.7 21.7079 10.4L18.1079 14.4L18.6079 19.8C18.7079 20.7 17.7079 21.4 16.9079 21L12.0079 18.8L7.10785 21C6.20785 21.4 5.30786 20.7 5.40786 19.8L5.90786 14.4L2.30785 10.4C1.70785 9.7 2.00786 8.6 3.00786 8.4L8.30785 7.2L11.0079 2.6C11.3079 1.8 12.5079 1.8 13.0079 2.6Z" fill="currentColor"/>
        </svg>';
      }
      if($type=="trophy"){
        return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor"/>
        <path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="currentColor"/>
        </svg>';
      }
    }
 }








//    /**
//  *DISPLAY Latest Post on Home Page
//  */
// if(!function_exists('views_week_ago')){
//     function views_week_ago(){
//       // return DB::table('web_views');
//        return webViews::select(DB::raw("(SUM(hits)) as count"),DB::raw("DAYNAME(created_at) as dayname"))
//        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
//       ->whereYear('created_at', date('Y'))
//       ->groupBy('dayname')
//      ->get()->toArray();

//     }
//  }



   /**
 *SENDING DB NOTIFICATIONS TO ADMIN
 */
if(!function_exists('notify_admin')){
    function notify_admin($title, $msg = null, $type= 'success'){
                // return   //send emails to users 
                $admin = User::where('role', '==', 2)->get();
               dbNotify($title, $msg, $type, 'hi', $admin, true);

    }
 }


   /**
 * RECENTLY ONBOARDED LISTING
 */
if(!function_exists('recently_onboarded_listing')){
    function recently_onboarded_listing($amount = 3){
              return  Listing::where('onboarded_by', "!=", null)->orderBy('onboarded_on', 'DESC')->limit($amount)->get();

    }
 }

//    /**
//  *SENDING DB NOTIFICATIONS TO ADMIN
//  */
// if(!function_exists('allLogs')){
//     function allLogs(){
//                 return Logs::where('id', '!=', null)->orderBy('id', 'desc')->get();

//     }
//  }



 
//    /**
//  *SENDING DB NOTIFICATIONS TO ADMIN
//  */
// if(!function_exists('')){
//   function all_testimonials(){
//               return Testimonials::where('active', true)->orderBy('id', 'desc')->get();

//   }
// }


/**
 * Get Percentage Null in Array
 */
 if(!function_exists('getPercentNull')){
  function getPercentNull($array, $except = []){
    $totalCount = [];
    $notEmptyFields = [];
    $EmptyFields = [];
    //bringing out th required keys to search for null indexes
    foreach ($array as $key => $value) {
      if(!in_array($key, $except)){
        array_push($totalCount, $key);
      }
    }
    // return $totalCount;

    $totalCount = count($totalCount);
    foreach ($array as $key => $value) {
     if(!empty($value) && $value != null){
      if(!in_array($key, $except)){
          array_push($notEmptyFields, $key);
      }
    }else{
         if(!in_array($key, $except)){
             array_push($EmptyFields, $key);
         }
       
     }

    }
    // dd($notEmptyFields, $EmptyFields);
    // return $notEmptyFields;
    $notEmptyFields = count($notEmptyFields);
    $percentage = ($notEmptyFields / $totalCount) * 100;
    return round($percentage, 0, PHP_ROUND_HALF_UP);
  }
 }


 
//    /**
//  *SEND EMAIL HELPER FILE
//  */
// if(!function_exists('sendMailPHP')){
//     function sendMailPHP($mailConfig){
        
//         require 'PHPMailer/src/Exception.php';
//         require 'PHPMailer/src/PHPMailer.php';
//         require 'PHPMailer/src/SMTP.php';
//  try {
//         $mail = new PHPMailer(true);
//         $mail->SMTPDebug = 0;
//         $mail->isSMTP();
//         $mail->Host = env('EMAIL_HOST');
//         $mail->SMTPAuth = true;
//         $mail->Username = env('EMAIL_USERNAME');
//         $mail->Password = env('EMAIL_PASSWORD');
//         $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
//         $mail->Port = env('EMAIL_PORT');
//         // $mail->Host = env('EMAIL_HOST');

//         $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
//         $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);
//         $mail->isHTML(true);
//         $mail->Subject = $mailConfig['mail_subject'];
//         $mail->Body = $mailConfig['mail_body'];

       
//           $mail->send();
//           return true;
//         } catch (\Throwable $th) {
//           notify_admin("Error sending mailto ".$mailConfig['mail_recipient_email'], "Error: ".$th->getMessage(), 'danger');
//           return false;
//         }

//     }
//  }


