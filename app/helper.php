<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Listing;
use App\Models\AppSettings;
use Illuminate\Support\Str;
use App\Models\ListingFiles;
use App\Mail\MailNotification;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ADMDbNotification;
use Illuminate\Support\Facades\Notification;



if (!function_exists("mailNotify")) {
  /**
   * SENDING EMAIL NOTIFICATIONS TO USERS 
   * format* 
   * $data = ["user"  ,
   *  "subject" ,
   *  "title" ,
   * "panel" ,
   *"message" ,
   *"button" => [
            *  "text" ,
            *  "url",
            * "color",
          * ]];
   */
  function mailNotify(array $data)
  {
    if (!isset($data['subject'])) {
      $data['subject'] =  $data['title'];
    }
    Mail::to($data['user']->email)->send(new MailNotification($data)); // 10 secs

  }
}

// dd('i');
/**
 * Sendign email helper using phpMailer 
 */

if (!function_exists("sendMail")) {
  function sendMail($emailConfig)
  {

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = env('EMAIL_HOST');
    $mail->SMTPAuth = true;
    $mail->Username = env('EMAIL_USERNAME');
    $mail->Password = env('EMAIL_PASSWORD');
    $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
    $mail->Port = env('EMAIL_PORT');
    $mail->setFrom($emailConfig['mail_from_email'], $emailConfig['mail_from_name']);
    $mail->addAddress($emailConfig['mail_recipient_email'], $emailConfig['mail_recipient_name']);
    $mail->isHTML(true);
    $mail->Subject = $emailConfig['mail_subject'];
    $mail->Body = $emailConfig['mail_body'];

    // if(!empty(env("IMAP_SERVER"))){
    //   // Append the sent email to the IMAP server's "Sent" folder
    // // Enable the IMAP extension from your php.ini file
    // $imap_stream = imap_open("{" . env("IMAP_SERVER") . ":" . env("IMAP_PORT") . "/ssl/novalidate-cert}",env('EMAIL_USERNAME'), env('EMAIL_PASSWORD'));
    // if ($imap_stream) {
    //   imap_append($imap_stream, "{" . env("IMAP_SERVER") . ":" . env("IMAP_PORT") . "/ssl/novalidate-cert}Sent", $mail->getSentMIMEMessage());
    //   echo 'Email appended to "Sent" folder.';
    //   imap_close($imap_stream);
    // } else {
    //   echo 'Error appending email to "Sent" folder.';
    // }
    // }
    if ($mail->send()) {
      return true;
    } else {
      return false;
    }
  }
}
if (!function_exists("guest_nav_links")) {
  function guest_nav_links()
  {
    return [
      ['name' => 'Home', 'url' => route('guest.home')],
      ['name' => 'Brands', 'url' => [
        ['Create Listings', route('listing.create')],
      ]],
      ['name' => 'Creators', 'url' => [
        ['Find Creators', route('guest.find_creators')],
        ['Listings', route('listing.index')],
      ]],
      ['name' => 'Others', 'url' => [
        ['Privacy Policy', route('guest.privacy_policy')],
        ['Terms of Service', route('guest.privacy_policy')],
        ['Whats new?', route('changelog')]
      ]],
    ];
  }
}
// rocket, 
//    * briefcase, 
//    * bank, 
//    * search, 
//    * pencil, 
//    * warning, 
//    * card, 
//    * lock-shield, '
//    * bin , 
//    * check-square, 
//    * trophy, 
//    * cursor, 
//    * globe, 
//    * dollar, 
//    * hour-glass, 
//    * users, 
//    * bell_box, 
//    * spanner
if (!function_exists("get_guest_services")) {
  function get_guest_services()
  {
    return [
      [
        'title' => 'Job Listings',
        'icon' => 'briefcase',
        'description' => "Discover a variety of job listings from top brands seeking digital marketing expertise and brand ambassador services. Our extensive network connects you with exciting opportunities."
      ],
      [
        'title' => "Apply & Collaborate",
        'icon' => "globe",
        'description' => "Apply for job listings that match your skills and interests. Collaborate with brands on unique campaigns and projects that allow you to showcase your creativity."
      ],
      [
        'title' => "Performance Tracking",
        'icon' => "cursor",
        'description' => "Keep tabs on your performance and earnings through our intuitive dashboard. Real-time data and insights help you make informed decisions."
      ],
      [
        'title' => "Secure Payments",
        'icon' => "dollar",
        'description' => "We ensure that your hard work is rewarded promptly. Enjoy secure and hassle-free payments once you've successfully completed tasks for brands."
      ],
      [
        'title' => "Community Support",
        'icon' => "search",
        'description' => "Join a vibrant community of creators, marketers, and ambassadors. Share experiences, gain insights, and grow your network."
      ],
      [
        'title' => "Feedback & Ratings",
        'icon' => "lock-shield",
        'description' => "Receive valuable feedback and ratings from brands to boost your profile and credibility in the industry."
      ],
      [
        'title' => "Innovation Hub",
        'icon' => "search",
        'description' => "Access resources, webinars, and tools to enhance your skills and stay updated with the latest trends in digital marketing and brand promotion."
      ],
      [
        'title' => "Career Growth",
        'icon' => "rocket",
        'description' => "Whether you're just starting or a seasoned professional, " . ucwords(appSetting('app_name')) . " offers opportunities for career growth and skill development."
      ],
      [
        'title' => "Earn Your Way",
        'icon' => "users",
        'description' => "At " . ucwords(appSetting('app_name')) . ", you're in control of your earnings. The more creative and dedicated you are, the more you can earn."
      ],
    ];
  }
}


if (!function_exists("get_guest_whyus")) {
  function get_guest_whyus($count = 4)
  {
    $whyus =  [
      [
        'title' => 'Diverse Opportunities',
        'description' => ' Access a wide range of job listings from renowned brands.'
      ],

      [
        'title' => 'Transparency',
        'description' => ' Enjoy clear, trustworthy processes from job details to payments.'
      ],

      [
        'title' => 'Earnings Control',
        'description' => ' Take charge of your income; more tasks mean more earnings.'
      ],

      [
        'title' => 'Community Support',
        'description' => ' Connect and learn from like-minded professionals.'
      ],

      [
        'title' => 'Career Growth',
        'description' => ' Boost your career with exposure, portfolio building, and skill expansion.'
      ],

      [
        'title' => 'Innovation Hub',
        'description' => ' Stay updated with the latest industry trends and tools.'
      ],

      [
        'title' => 'Secure Payments',
        'description' => ' Receive secure and prompt payments.'
      ],

      [
        'title' => 'Feedback & Ratings',
        'description' => ' Build your industry reputation with valuable feedback.'
      ],

      [
        'title' => 'Flexibility',
        'description' => ' Work on your terms with project flexibility.'
      ],

      [
        'title' => 'One-Stop Solution',
        'description' => ' Find all your creative needs under one roof.'
      ],

      [
        'title' => 'Empowering Creativity',
        'description' => ' Celebrate your creativity while earning.'
      ],

      [
        'title' => 'Rewarding Impact',
        'description' => ' See your creativity make a difference.'
      ],

    ];

    // Shuffle the array to randomize the order
    shuffle($whyus);
    // Slice the array to select the first $count items
    $randomItems = array_slice($whyus, 0, $count);

    return $randomItems;
  }
}
if (!function_exists("get_guest_testimonials")) {
  function get_guest_testimonials($count = 6)
  {
    $testimonials = [
      [
        'name' => 'John Doe',
        'testimony' => '' . ucwords(appSetting('app_name')) . ' has transformed my creative career. The opportunities are endless, and the community is supportive.',
        'role' => 'Digital Marketer'
      ],
      [
        'name' => 'Jane Smith',
        'testimony' => 'I love the flexibility ' . ucwords(appSetting('app_name')) . ' offers. I can work on exciting projects and earn on my terms.',
        'role' => 'Brand Ambassador'
      ],
      [
        'name' => 'David Johnson',
        'testimony' => 'Working with top brands on ' . ucwords(appSetting('app_name')) . ' has expanded my portfolio and boosted my career.',
        'role' => 'Content Creator'
      ],
      [
        'name' => 'Emily Davis',
        'testimony' => '' . ucwords(appSetting('app_name')) . ' is the go-to platform for creative professionals. Secure payments and great opportunities!',
        'role' => 'Graphic Designer'
      ],
      [
        'name' => 'Michael Brown',
        'testimony' => "I've gained valuable feedback and improved my skills through " . ucwords(appSetting('app_name')) . ". It's a game-changer!",
        'role' => 'Social Media Manager'
      ],
      [
        'name' => 'Sarah Wilson',
        'testimony' => ucwords(appSetting('app_name')) . " is my creative hub. It connects me to amazing projects, and I'm loving every moment of it.",
        'role' => 'Influencer'
      ],
      [
        'name' => 'Alex Turner',
        'testimony' => 'Being a part of ' . ucwords(appSetting('app_name')) . ' has allowed me to make a real impact while doing what I love.',
        'role' => 'Content Strategist'
      ]
    ];


    // Shuffle the array to randomize the order
    shuffle($testimonials);

    return $testimonials;
  }
}

/**
 * DATE FORMAT eg. time ago 
 */
if (!function_exists("time_Ago")) {
  function time_Ago($time)
  {

    $time = strtotime($time);
    // Calculate difference between current
    // time and given timestamp in seconds
    $diff     = time() - $time;

    // Time difference in seconds
    $sec     = $diff;

    // Convert time difference in minutes
    $min     = round($diff / 60);

    // Convert time difference in hours
    $hrs     = round($diff / 3600);

    // Convert time difference in days
    $days     = round($diff / 86400);

    // Convert time difference in weeks
    $weeks     = round($diff / 604800);

    // Convert time difference in months
    $mnths     = round($diff / 2600640);

    // Convert time difference in years
    $yrs     = round($diff / 31207680);

    // Check for seconds
    if ($sec <= 60) {
      echo "$sec sec ago";
    }

    // Check for minutes
    else if ($min <= 60) {
      if ($min == 1) {
        echo "one min ago";
      } else {
        echo "$min mins ago";
      }
    }

    // Check for hours
    else if ($hrs <= 24) {
      if ($hrs == 1) {
        echo "an hr ago";
      } else {
        echo "$hrs hrs ago";
      }
    }

    // Check for days
    else if ($days <= 7) {
      if ($days == 1) {
        echo "Yesterday";
      } else {
        echo "$days days ago";
      }
    }

    // Check for weeks
    else if ($weeks <= 4.3) {
      if ($weeks == 1) {
        echo "a week ago";
      } else {
        echo "$weeks weeks ago";
      }
    }

    // Check for months
    else if ($mnths <= 12) {
      if ($mnths == 1) {
        echo "a mth ago";
      } else {
        echo "$mnths mths ago";
      }
    }

    // Check for years
    else {
      if ($yrs == 1) {
        echo "a yr ago";
      } else {
        echo "$yrs yrs ago";
      }
    }
  }
}

/**
 * GET LATES FILES 
 */
if (!function_exists("getLatestFiles")) {
  function getLatestFiles($listing_slug, $amount = 4)
  {
    $listing =  Listing::where('slug', $listing_slug)->first();
    $listingFiles = $listing->files()->orderBy('created_at', 'DESC')->limit($amount)->get();
    return $listingFiles;
  }
}

if (!function_exists("fetchFeaturedCreators")) {
  /**
   * GET FEATURES CREATORS
   */
  function fetchFeaturedCreators($limit = 5)
  {
    return  User::where("rating", "!=", 0)->orderBy('rating', 'desc')->limit($limit)->get();
  }
}

/**
 * DATE FORMAT eg. January 12, 2023
 */
if (!function_exists("percent_two_values")) {
  function percent_two_values($section, $total)
  {
    return round((($section / $total) * 100), 0, PHP_ROUND_HALF_UP);
  }
}

/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if (!function_exists("dbNotify")) {
  function dbNotify($title, $message, $type, $user, $icon = '', $is_object = false)
  {
    $data_array = [
      "icon" => $icon,
      'title' => $title,
      'message' => $message,
      'type' => $type
    ];
    if ($is_object) {
      foreach ($user as $single_user) {
        Notification::send($single_user, new ADMDbNotification($data_array));
      }
    } else {
      $user->notify((new ADMDbNotification($data_array)));
    }
  }
}

/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if (!function_exists("getUserNotifications")) {
  function getUserNotifications($user_id = null)
  {
    $user = auth()->user();
    if (!is_null($user_id)) {
      $user =  User::find($user_id);
    }
    return $user->notifications;
  }
}


/**
 * SEND DB NOTIFICATIONS TO USER 
 */
if (!function_exists("saveTransaction")) {
  function saveTransaction($data, $message, $user = null)
  {
    if ($user == null) {
      $user = User::find(auth()->user()->id);
    }

    //    save transaction in db
    $user->transactions()->firstOrCreate([
      'transaction_id' => $data->id,
    ], [
      'user_id' => $user,
      'transaction_id' => $data->id,
      'message' => (is_null($data->message)) ? $message : $data->message,
      'paid_for' => $message,
      'status' => $data->status,
      'data' => $data,
    ]);
  }
}

/**
 * Get USer Card Details
 */
if (!function_exists("getCardList")) {
  function getCardList($user = null)
  {
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

if (!function_exists('date_formatter')) {
  function date_formatter($date)
  {
    $date = strtotime($date);
    $date = Carbon::createFromTimestamp($date);
    return Carbon::createFromFormat("Y-m-d H:i:s", $date)->isoFormat("LL");
  }
}



/**
 * STRIP HTML WORDS
 */
if (!function_exists('words')) {
  function words($value, $words = 15, $end = "...")
  {
    return Str::words(strip_tags($value), $words, $end);
  }
}



/**
 * CHECK ONLINE STATUS
 */
if (!function_exists('isOnline')) {
  function isOnline($site = "https://youtube.com/")
  {
    if (@fopen($site, "r")) {
      return true;
    } else {
      return false;
    }
  }
}

/**
 * Reading Article Duration
 */

if (!function_exists('readDuration')) {
  function readDuration(...$text)
  {
    Str::macro('timeCounter', function ($text) {
      $totalWords = str_word_count(implode(" ", $text));
      $minuitesToRead = round($totalWords / 200);
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

if (!function_exists('appSetting')) {
  function appSetting($column_query)
  {
    $result = AppSettings::select($column_query)->first();
    if ($result) {
      return $result->$column_query;
    }
  }
}


/**
 * Get all Admin Settings
 * 
 * @param string $column_query The required column to return 
 */

if (!function_exists('countFiles')) {
  function countFiles($dir)
  {

    if (is_dir($dir)) {

      $dir = opendir($dir);
      $i = 0;
      while (false !== ($file = readdir($dir))) {
        if (is_dir($file) && !in_array($file, array('.', '..'))) {

          $i += countFiles($file);
        } else {
          $i++;
        }
      }
      return $i;
    } else {
      return 0;
    }
  }
}


/**
 * Get Folder Size
 *
 * @param string $folderPath the path to the specified folder
 */

if (!function_exists('folderSize')) {
  function folderSize($dir)
  {
    if (is_dir($dir)) {
      $count_size = 0;
      $count = 0;
      $dir_array = scandir($dir);
      foreach ($dir_array as $key => $filename) {
        if ($filename != ".." && $filename != ".") {
          if (is_dir($dir . "/" . $filename)) {
            $new_foldersize = foldersize($dir . "/" . $filename);
            $count_size = $count_size + $new_foldersize;
          } else if (is_file($dir . "/" . $filename)) {
            $count_size = $count_size + filesize($dir . "/" . $filename);
            $count++;
          }
        }
      }
      return sizeFormat($count_size);
    } else {
      return sizeFormat(0);
    }
  }
}


/**
 * format size
 *
 * @param string $bytes bytes toconvert
 */

if (!function_exists('sizeFormat')) {
  function sizeFormat($bytes)
  {
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
 * Array Search Inner
 *
 * @param array $array The target array
 * @param string $attr the key you are filtering by
 * @param string $val The value of the key you are searching for
 * @param boolean $strict use strict mode  or not
 */

function array_search_inner($array, $attr, $val, $strict = FALSE)
{
  // Error is input array is not an array
  if (!is_array($array)) return FALSE;
  // Loop the array
  foreach ($array as $key => $inner) {
    // Error if inner item is not an array (you may want to remove this line)
    // if (!is_array($inner)) return FALSE;
    // Skip entries where search key is not present
    if (!isset($inner[$attr])) continue;
    if ($strict) {
      // Strict typing
      if ($inner[$attr] === $val) return $key;
    } else {
      // Loose typing
      if ($inner[$attr] == $val) return $key;
    }
  }
  // We didn't find it
  return NULL;
}



/**
 * Get Related Listings 
 * [rocket, briefcase, bank, search, pencil, warning, card].
 *
 * @param string $amount the number of related gigs to return
 * @param int $listing_id specified listing_id
 * @param string $category_list the category you wish to get the list from
 */

if (!function_exists('related_listing')) {
  function related_listing($listing_id, $category_list, $amount = 3)
  {
    $category_id_list = [];
    foreach ($category_list->toArray() as $key) {
      $category_id_list[] = $key['id'];
    }
    //   return $category_id_list ;
    $related_listings = Listing::inRandomOrder()->take($amount)->whereHas('categories', function ($query) use ($category_id_list) {
      $query->whereIn('categories_id', $category_id_list);
    })->where(['is_active' => true, 'payment_status' => "paid"])->where('id', '!=', $listing_id)->get();

    return  $related_listings;
  }
}


if (!function_exists('popular_listing')) {

  /**
   * Get Popular Listing 
   *Get popular listing based on the number of applied users 
   *
   * @param integer $limit the number of popular gigs to return
   */
  function popular_listing($limit = 3)
  {
    $category_id_list = [];
    foreach ($category_list->toArray() as $key) {
      $category_id_list[] = $key['id'];
    }
    //   return $category_id_list ;
    $related_listings = Listing::inRandomOrder()->take($amount)->whereHas('categories', function ($query) use ($category_id_list) {
      $query->whereIn('categories_id', $category_id_list);
    })->where(['is_active' => true, 'payment_status' => "paid"])->where('id', '!=', $listing_id)->get();

    return  $related_listings;
  }
}

/**
 * Format Money 
 * 1000000 to 1,000,000.
 *
 * @param string $value the number 
 */

if (!function_exists('formatMoney')) {
  function formatMoney($value, $hasAbrv = false)
  {
    $value = intVal($value);
    if ($hasAbrv) {
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
    } else {
      return number_format($value, 2, '.', ',');
    }
  }
}



if (!function_exists('formatNumber')) {
  /**
   * Format Figure 
   * 1000000 to 1,000,000.
   *
   * @param string $value the number 
   */
  function formatNumber($value, $hasAbrv = true)
  {
    $value = intVal($value);
    if ($hasAbrv) {
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

      return number_format($value, 0, '.', ',');
    } else {
      return number_format($value, 0, '.', ',');
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

if (!function_exists('percentCalc')) {
  function percentCalc($value, $total)
  {
    if ($value !== 0) {

      return $percentage = ($value / $total) * 100;
    } else {
      return "NAN";
    }
  }
}
/**
 * Get Last Seen For User
 *
 * @param integer $user_id The specific user to get the last seen from
 */

if (!function_exists('get_last_seen')) {
  function get_last_seen($user_id, $getTimeAgo = true)
  {
    $last_seen =  DB::table('sessions')->where('user_id', $user_id)->orderBy('last_activity', 'desc')
      ->first();
    $timestamp = $last_seen->last_activity; // Replace with your timestamp

    // Create a Carbon instance from the timestamp
    $datetime = Carbon::createFromTimestamp($timestamp);

    // Retrieve the formatted date and time
    $date = $datetime->format('D-M-Y'); // Example output: 2022-January-19
    $time = $datetime->format('H:i:s a'); // Example output: 08:51:32
    // Convert the timestamp to "time ago" format
    $timeAgo = $datetime->diffForHumans();

   if($getTimeAgo){
    return $timeAgo;
   }else{
    return $date . '-' . $time;
   }
  }
}


if (!function_exists('getPlatformColorClass')) {
  /**
   * Dynamically assigns classes for text or background styling based on the platform.
   *
   * @param string $platform The name of the platform (e.g., 'facebook', 'youtube', etc.).
   * @param string $type The type of class to return ('text' or 'background').
   * @return string The CSS class for the platform's color.
   */
  function getPlatformColorClass(string $platform, string $type = 'text'): string
  {
      $platformColors = [
          'facebook' => [
              'theme' => 'primary',
              'text' => 'text-primary',
              'background' => 'bg-primary',
              'button' => 'bg-radial-gradient-primary',
              'border' => 'border-primary',

          ],
          'youtube' => [
              'theme' => 'danger',
              'text' => 'text-danger',
              'background' => 'bg-danger',
              'button' => 'bg-radial-gradient-danger',
              'border' => 'border-danger',

          ],
          'instagram' => [
              'theme' => 'warning',
              'text' => 'text-warning',
              'background' => 'bg-warning',
              'button' => 'bg-radial-gradient-warning',
              'border' => 'border-warning',

          ],
          'twitter' => [
              'theme' => 'info',
              'text' => 'text-info',
              'background' => 'bg-info',
              'button' => 'bg-radial-gradient-info',
              'border' => 'border-info',

          ],
          'linkedin' => [
              'theme' => 'dark',
              'text' => 'text-dark',
              'background' => 'bg-dark',
              'button' => 'bg-radial-gradient-dark',
              'border' => 'border-dark',

          ],
          'tiktok' => [
              'theme' => 'white',
              'text' => 'text-white',
              'background' => 'bg-black',
              'button' => 'bg-radial-gradient-black',
              'border' => 'border-black',

          ],
          'pinterest' => [
              'theme' => 'danger',
              'text' => 'text-danger',
              'background' => 'bg-danger',
              'button' => 'bg-radial-gradient-danger',
              'border' => 'border-danger',

          ],
          'snapchat' => [
              'theme' => 'warning',
              'text' => 'text-warning',
              'background' => 'bg-warning',
              'button' => 'bg-radial-gradient-warning',
              'border' => 'border-warning',

          ],
          'default' => [
              'theme' => 'muted',
              'text' => 'text-muted',
              'background' => 'bg-light',
              'button' => 'bg-radial-gradient-light',
              'border' => 'border-light',

          ],
      ];

      // Return the appropriate class or fallback to default
      return $platformColors[strtolower($platform)][$type] ?? $platformColors['default'][$type];
  }
}



if (!function_exists('getIcon')) {
  /**
   * Return an svg Icon 
   * [
   * group-chat, 
   * shield-user, 
   * union, 
   * layers, 
   * flower, 
   * settings-1, 
   * settings-3, 
   * shield-thunder, 
   * folder, 
   * right-arrow, 
   * 4-blocks, 
   * notification, 
   * shield-check, 
   * time-schedule, 
   * rocket, 
   * briefcase, 
   * bank, 
   * search, 
   * pencil, 
   * warning, 
   * card, 
   * lock-shield, '
   * bin , 
   * check-square, 
   * trophy, 
   * cursor, 
   * globe, 
   * dollar, 
   * hour-glass, 
   * users, 
   * file-up, 
   * wallet, 
   * plus, 
   * dash-circle, 
   * check-circle, 
   * bell_box, 
   * spanner].
   *
   * @param int $type is the specified icon.
   */
  function getIcon($type)
  {
    if ($type == "group-chat") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / Communication / Group-chat</title>
    <desc>Created with Sketch.</desc>
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg>';
    }
    if ($type == "shield-user") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
          <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
          <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
      </g>
  </svg>';
    }
    if ($type == "union") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M8,9 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L15,16 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L8,9 Z" fill="#000000" fill-rule="nonzero"/>
      </g>
  </svg>';
    }
    if ($type == "layers") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24"/>
          <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
          <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
      </g>
  </svg>';
    }
    if ($type == "flower") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24"/>
          <circle fill="#000000" opacity="0.3" cx="15" cy="17" r="5"/>
          <circle fill="#000000" opacity="0.3" cx="9" cy="17" r="5"/>
          <circle fill="#000000" opacity="0.3" cx="7" cy="11" r="5"/>
          <circle fill="#000000" opacity="0.3" cx="17" cy="11" r="5"/>
          <circle fill="#000000" opacity="0.3" cx="12" cy="7" r="5"/>
      </g>
  </svg>';
    }
    if ($type == "settings-1") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
          <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
      </g>
  </svg>';
    }
    if ($type == "settings-3") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <rect fill="#000000" opacity="0.3" x="2" y="6" width="21" height="12" rx="6"/>
          <circle fill="#000000" cx="17" cy="12" r="4"/>
      </g>
  </svg>';
    }
    if ($type == "shield-thunder") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
          <polygon fill="#000000" opacity="0.3" points="11.3333333 18 16 11.4 13.6666667 11.4 13.6666667 7 9 13.6 11.3333333 13.6"/>
      </g>
  </svg>';
    }
    if ($type == "folder") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000"/>
      </g>
  </svg>';
    }
    if ($type == "4-blocks") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
          <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
      </g>
  </svg>';
    }
    if ($type == "right-arrow") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24"/>
          <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
          <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
      </g>
  </svg>';
    }
    if ($type == "notification") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
          <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
      </g>
  </svg>';
    }
    if ($type == "shield-check") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
          <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
      </g>
  </svg>';
    }
    if ($type == "time-schedule") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
          <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
      </g>
  </svg>';
    }
    if ($type == "dash-circle") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
      </g>
  </svg>';
    }
    if ($type == "check-circle") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"/>
          <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
          <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
      </g>
  </svg>';
    }
    if ($type == "plus") {
      return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
          <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
      </g>
  </svg>';
    }
    if ($type == "wallet") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"/>
      <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"/>
      <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"/>
      </svg>';
    }
    if ($type == "file-up") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM14.5 12L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L10 12H11.5V17C11.5 17.6 11.4 18 12 18C12.6 18 12.5 17.6 12.5 17V12H14.5Z" fill="currentColor"/>
      <path d="M13 11.5V17.9355C13 18.2742 12.6 19 12 19C11.4 19 11 18.2742 11 17.9355V11.5H13Z" fill="currentColor"/>
      <path d="M8.2575 11.4411C7.82942 11.8015 8.08434 12.5 8.64398 12.5H15.356C15.9157 12.5 16.1706 11.8015 15.7425 11.4411L12.4375 8.65789C12.1875 8.44737 11.8125 8.44737 11.5625 8.65789L8.2575 11.4411Z" fill="currentColor"/>
      <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
      </svg>';
    }
    if ($type == "spanner") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M22.0318 8.59998C22.0318 10.4 21.4318 12.2 20.0318 13.5C18.4318 15.1 16.3318 15.7 14.2318 15.4C13.3318 15.3 12.3318 15.6 11.7318 16.3L6.93177 21.1C5.73177 22.3 3.83179 22.2 2.73179 21C1.63179 19.8 1.83177 18 2.93177 16.9L7.53178 12.3C8.23178 11.6 8.53177 10.7 8.43177 9.80005C8.13177 7.80005 8.73176 5.6 10.3318 4C11.7318 2.6 13.5318 2 15.2318 2C16.1318 2 16.6318 3.20005 15.9318 3.80005L13.0318 6.70007C12.5318 7.20007 12.4318 7.9 12.7318 8.5C13.3318 9.7 14.2318 10.6001 15.4318 11.2001C16.0318 11.5001 16.7318 11.3 17.2318 10.9L20.1318 8C20.8318 7.2 22.0318 7.59998 22.0318 8.59998Z" fill="currentColor"/>
        <path d="M4.23179 19.7C3.83179 19.3 3.83179 18.7 4.23179 18.3L9.73179 12.8C10.1318 12.4 10.7318 12.4 11.1318 12.8C11.5318 13.2 11.5318 13.8 11.1318 14.2L5.63179 19.7C5.23179 20.1 4.53179 20.1 4.23179 19.7Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "bell_box") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M14 3V20H2V3C2 2.4 2.4 2 3 2H13C13.6 2 14 2.4 14 3ZM11 13V11C11 9.7 10.2 8.59995 9 8.19995V7C9 6.4 8.6 6 8 6C7.4 6 7 6.4 7 7V8.19995C5.8 8.59995 5 9.7 5 11V13C5 13.6 4.6 14 4 14V15C4 15.6 4.4 16 5 16H11C11.6 16 12 15.6 12 15V14C11.4 14 11 13.6 11 13Z" fill="currentColor"/>
        <path d="M2 20H14V21C14 21.6 13.6 22 13 22H3C2.4 22 2 21.6 2 21V20ZM9 3V2H7V3C7 3.6 7.4 4 8 4C8.6 4 9 3.6 9 3ZM6.5 16C6.5 16.8 7.2 17.5 8 17.5C8.8 17.5 9.5 16.8 9.5 16H6.5ZM21.7 12C21.7 11.4 21.3 11 20.7 11H17.6C17 11 16.6 11.4 16.6 12C16.6 12.6 17 13 17.6 13H20.7C21.2 13 21.7 12.6 21.7 12ZM17 8C16.6 8 16.2 7.80002 16.1 7.40002C15.9 6.90002 16.1 6.29998 16.6 6.09998L19.1 5C19.6 4.8 20.2 5 20.4 5.5C20.6 6 20.4 6.60005 19.9 6.80005L17.4 7.90002C17.3 8.00002 17.1 8 17 8ZM19.5 19.1C19.4 19.1 19.2 19.1 19.1 19L16.6 17.9C16.1 17.7 15.9 17.1 16.1 16.6C16.3 16.1 16.9 15.9 17.4 16.1L19.9 17.2C20.4 17.4 20.6 18 20.4 18.5C20.2 18.9 19.9 19.1 19.5 19.1Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "users") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
        <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
        <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
        <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
        </svg>';
    }
    if ($type == "hour-glass") {
      return '<svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M12 6.20001V1.20001H2V6.20001C2 6.50001 2.1 6.70001 2.3 6.90001L5.6 10.2L2.3 13.5C2.1 13.7 2 13.9 2 14.2V19.2H12V14.2C12 13.9 11.9 13.7 11.7 13.5L8.4 10.2L11.7 6.90001C11.9 6.70001 12 6.50001 12 6.20001Z" fill="currentColor"/>
        <path d="M13 2.20001H1C0.4 2.20001 0 1.80001 0 1.20001C0 0.600012 0.4 0.200012 1 0.200012H13C13.6 0.200012 14 0.600012 14 1.20001C14 1.80001 13.6 2.20001 13 2.20001ZM13 18.2H10V16.2L7.7 13.9C7.3 13.5 6.7 13.5 6.3 13.9L4 16.2V18.2H1C0.4 18.2 0 18.6 0 19.2C0 19.8 0.4 20.2 1 20.2H13C13.6 20.2 14 19.8 14 19.2C14 18.6 13.6 18.2 13 18.2ZM4.4 6.20001L6.3 8.10001C6.7 8.50001 7.3 8.50001 7.7 8.10001L9.6 6.20001H4.4Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "dollar") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M12.5 22C11.9 22 11.5 21.6 11.5 21V3C11.5 2.4 11.9 2 12.5 2C13.1 2 13.5 2.4 13.5 3V21C13.5 21.6 13.1 22 12.5 22Z" fill="currentColor"/>
        <path d="M17.8 14.7C17.8 15.5 17.6 16.3 17.2 16.9C16.8 17.6 16.2 18.1 15.3 18.4C14.5 18.8 13.5 19 12.4 19C11.1 19 10 18.7 9.10001 18.2C8.50001 17.8 8.00001 17.4 7.60001 16.7C7.20001 16.1 7 15.5 7 14.9C7 14.6 7.09999 14.3 7.29999 14C7.49999 13.8 7.80001 13.6 8.20001 13.6C8.50001 13.6 8.69999 13.7 8.89999 13.9C9.09999 14.1 9.29999 14.4 9.39999 14.7C9.59999 15.1 9.8 15.5 10 15.8C10.2 16.1 10.5 16.3 10.8 16.5C11.2 16.7 11.6 16.8 12.2 16.8C13 16.8 13.7 16.6 14.2 16.2C14.7 15.8 15 15.3 15 14.8C15 14.4 14.9 14 14.6 13.7C14.3 13.4 14 13.2 13.5 13.1C13.1 13 12.5 12.8 11.8 12.6C10.8 12.4 9.99999 12.1 9.39999 11.8C8.69999 11.5 8.19999 11.1 7.79999 10.6C7.39999 10.1 7.20001 9.39998 7.20001 8.59998C7.20001 7.89998 7.39999 7.19998 7.79999 6.59998C8.19999 5.99998 8.80001 5.60005 9.60001 5.30005C10.4 5.00005 11.3 4.80005 12.3 4.80005C13.1 4.80005 13.8 4.89998 14.5 5.09998C15.1 5.29998 15.6 5.60002 16 5.90002C16.4 6.20002 16.7 6.6 16.9 7C17.1 7.4 17.2 7.69998 17.2 8.09998C17.2 8.39998 17.1 8.7 16.9 9C16.7 9.3 16.4 9.40002 16 9.40002C15.7 9.40002 15.4 9.29995 15.3 9.19995C15.2 9.09995 15 8.80002 14.8 8.40002C14.6 7.90002 14.3 7.49995 13.9 7.19995C13.5 6.89995 13 6.80005 12.2 6.80005C11.5 6.80005 10.9 7.00005 10.5 7.30005C10.1 7.60005 9.79999 8.00002 9.79999 8.40002C9.79999 8.70002 9.9 8.89998 10 9.09998C10.1 9.29998 10.4 9.49998 10.6 9.59998C10.8 9.69998 11.1 9.90002 11.4 9.90002C11.7 10 12.1 10.1 12.7 10.3C13.5 10.5 14.2 10.7 14.8 10.9C15.4 11.1 15.9 11.4 16.4 11.7C16.8 12 17.2 12.4 17.4 12.9C17.6 13.4 17.8 14 17.8 14.7Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "globe") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor"/>
        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "cursor") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19.4 13.9411L10.7 5.24112C10.4 4.94112 10 4.84104 9.60001 5.04104C9.20001 5.24104 9 5.54107 9 5.94107V18.2411C9 18.6411 9.20001 18.941 9.60001 19.141C9.70001 19.241 9.9 19.2411 10 19.2411C10.2 19.2411 10.4 19.141 10.6 19.041C11.4 18.441 12.1 17.941 12.9 17.541L14.4 21.041C14.6 21.641 15.2 21.9411 15.8 21.9411C16 21.9411 16.2 21.9411 16.4 21.8411C17.2 21.5411 17.5 20.6411 17.2 19.8411L15.7 16.2411C16.7 15.9411 17.7 15.741 18.8 15.541C19.2 15.541 19.5 15.2411 19.6 14.8411C19.8 14.6411 19.7 14.2411 19.4 13.9411Z" fill="currentColor"/>
        <path opacity="0.3" d="M15 6.941C14.8 6.941 14.7 6.94102 14.6 6.84102C14.1 6.64102 13.9 6.04097 14.2 5.54097L15.2 3.54097C15.4 3.04097 16 2.84095 16.5 3.14095C17 3.34095 17.2 3.941 16.9 4.441L15.9 6.441C15.7 6.741 15.4 6.941 15 6.941ZM18.4 9.84102L20.4 8.84102C20.9 8.64102 21.1 8.04097 20.8 7.54097C20.6 7.04097 20 6.84095 19.5 7.14095L17.5 8.14095C17 8.34095 16.8 8.941 17.1 9.441C17.3 9.841 17.6 10.041 18 10.041C18.2 9.94097 18.3 9.94102 18.4 9.84102ZM7.10001 10.941C7.10001 10.341 6.70001 9.941 6.10001 9.941H4C3.4 9.941 3 10.341 3 10.941C3 11.541 3.4 11.941 4 11.941H6.10001C6.70001 11.941 7.10001 11.541 7.10001 10.941ZM4.89999 17.1409L6.89999 16.1409C7.39999 15.9409 7.59999 15.341 7.29999 14.841C7.09999 14.341 6.5 14.141 6 14.441L4 15.441C3.5 15.641 3.30001 16.241 3.60001 16.741C3.80001 17.141 4.1 17.341 4.5 17.341C4.6 17.241 4.79999 17.2409 4.89999 17.1409Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "rocket") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor"/>
        <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor"/>
        </svg>';
    }

    if ($type == "briefcase") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor"/>
            <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor"/>
            <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor"/>
            <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor"/>
            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
            </svg>';
    }
    if ($type == "bank") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="currentColor"/>
        <path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "card") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "search") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="currentColor"/>
        <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "pencil") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="currentColor"/>
        <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="currentColor"/>
        <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "warning") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
        <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
        <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="currentColor"/>
        </svg>';
    }
    if ($type == "card") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "lock-shield") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
        <path d="M14.854 11.321C14.7568 11.2282 14.6388 11.1818 14.4998 11.1818H14.3333V10.2272C14.3333 9.61741 14.1041 9.09378 13.6458 8.65628C13.1875 8.21876 12.639 8 12 8C11.361 8 10.8124 8.21876 10.3541 8.65626C9.89574 9.09378 9.66663 9.61739 9.66663 10.2272V11.1818H9.49999C9.36115 11.1818 9.24306 11.2282 9.14583 11.321C9.0486 11.4138 9 11.5265 9 11.6591V14.5227C9 14.6553 9.04862 14.768 9.14583 14.8609C9.24306 14.9536 9.36115 15 9.49999 15H14.5C14.6389 15 14.7569 14.9536 14.8542 14.8609C14.9513 14.768 15 14.6553 15 14.5227V11.6591C15.0001 11.5265 14.9513 11.4138 14.854 11.321ZM13.3333 11.1818H10.6666V10.2272C10.6666 9.87594 10.7969 9.57597 11.0573 9.32743C11.3177 9.07886 11.6319 8.9546 12 8.9546C12.3681 8.9546 12.6823 9.07884 12.9427 9.32743C13.2031 9.57595 13.3333 9.87594 13.3333 10.2272V11.1818Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "bin") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"/>
        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"/>
        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "check-square") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
        <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "star-filled") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.0079 2.6L15.7079 7.2L21.0079 8.4C21.9079 8.6 22.3079 9.7 21.7079 10.4L18.1079 14.4L18.6079 19.8C18.7079 20.7 17.7079 21.4 16.9079 21L12.0079 18.8L7.10785 21C6.20785 21.4 5.30786 20.7 5.40786 19.8L5.90786 14.4L2.30785 10.4C1.70785 9.7 2.00786 8.6 3.00786 8.4L8.30785 7.2L11.0079 2.6C11.3079 1.8 12.5079 1.8 13.0079 2.6Z" fill="currentColor"/>
        </svg>';
    }
    if ($type == "trophy") {
      return '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor"/>
        <path opacity="0.3" d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z" fill="currentColor"/>
        </svg>';
    }
  }
}





if (!function_exists('isImage')) {
  /**
   * Check if a file extension corresponds to an image.
   *
   * @param string $extension The file extension to check.
   * @return bool
   */
  function isImage($extension)
  {
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']; // Add more if needed

    return in_array(strtolower($extension), $imageExtensions);
  }
}



/**
 *saveAvatar($url)
 *Saves Image url locally and return Local file Path
 *$url param string
 */
if (!function_exists('saveAvatar')) {
  function saveAvatar($url, $folder = 'profile-photos/')
  {
    $filename = basename($url);

    $contents = file_get_contents($url);

    $path = public_path('storage/' . $folder . $filename);

    file_put_contents($path, $contents);

    return $folder . $filename;
  }
}



/**
 *SENDING DB NOTIFICATIONS TO ADMIN
 */
if (!function_exists('notify_admin')) {
  function notify_admin($title, $msg = null, $type = 'success', $icon = 'users')
  {
    // return   //send emails to users 
    $admin = User::where('role', '==', 2)->get();
    dbNotify($title, $msg, $type, $admin, $icon, true);
  }
}


/**
 *GET LISTING STATS OF SELECTED USER
 *returns eg("12 listings completed out of 15")
 */
if (!function_exists('getListingStats')) {
  function getListingStats($user_id)
  {
    $listing_completed = User::find($user_id)->applied_listings()->where('completed_on', '!=', NULL)->get();
    $total_listing = User::find($user_id)->applied_listings;

    return count($listing_completed) . " of " . count($total_listing) . " completed listings";
  }
}

if (!function_exists('getFileExtFromUrl')) {
  /**
   *Get file extension from url
   *returns eg("png, jpeg, pdf")
   */
  function getFileExtFromUrl($url)
  {
    $fileExtension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
    return $fileExtension;
  }
}


/**
 * RECENTLY ONBOARDED LISTING
 */
if (!function_exists('recently_onboarded_listing')) {
  function recently_onboarded_listing($amount = 3)
  {
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



if (!function_exists('createLog')) {
  /**
   *SAVING USER LOGS IN DB
   * @param string $message - the message of the log make it short and concised
   * @param string $icon - the icon of the log recommended to use 'getIcon()' function
   * @param string $type - the type of log, it canbe success, info, danger, warning or primary
   * @param integer $user_id -  the target user id that has the log, leave blank if target user is authenticated user
   */
  function createLog($message, $icon, $type, $user_id = null)
  {
    if (is_null($user_id)) {
      $user_id = auth()->user()->id;
    }
    \App\Models\UserLogs::create([
      'message' => $message,
      'icon' => $icon,
      'type' => $type,
      'user_id' => $user_id,
    ]);
  }
}

if (!function_exists('deleteLogs')) {
  function deleteLogs()
  {
    \App\Models\UserLogs::truncate();
  }
}

if (!function_exists('getLogs')) {
  function getLogs()
  {
    return auth()->user()->logs()->orderBy('created_at', 'desc')->get();
  }
}




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
if (!function_exists('getPercentNull')) {
  function getPercentNull($array, $except = [])
  {
    $totalCount = [];
    $notEmptyFields = [];
    $EmptyFields = [];
    //bringing out th required keys to search for null indexes
    foreach ($array as $key => $value) {
      if (!in_array($key, $except)) {
        array_push($totalCount, $key);
      }
    }
    // return $totalCount;

    $totalCount = count($totalCount);
    foreach ($array as $key => $value) {
      if (!empty($value) && $value != null) {
        if (!in_array($key, $except)) {
          array_push($notEmptyFields, $key);
        }
      } else {
        if (!in_array($key, $except)) {
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
