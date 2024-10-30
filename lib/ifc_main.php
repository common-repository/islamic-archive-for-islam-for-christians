<?php
$opicifc_categories_lang = array();

$opicifc_lang_list = array(
    'ara' => [
        'title' => 'Arabic',
        'link' => "https://ar.islamforchristians.com"
        ],
    'eng' => [
        'title'=> 'English',
        "link" => "https://www.islamforchristians.com",
        ],
    'es' => [
        'title'=> 'Español',
        "link" => "https://es.islamforchristians.com",
        ],
    'ru' => [
        'title'=> 'русский',
        "link" => "https://ru.islamforchristians.com",
        ],
    'ko' => [
        'title'=> '한국어',
        "link" => "https://ko.islamforchristians.com",
        ],
    /*,'rom'=>'Romanian','rus'=>'Russian','spa'=>'Spanish','hin'=>'Hindi','tag'=>'Tagalog','ben'=>'Bengali','sin'=>'Sinhalese','nep'=>'Nepali','tam'=>'Tamil','tel'=>'Telugu','mal'=>'Malayalm'*/);

// ======================   Titles ==============================
												
$ifccategories["islam_for_christians"] 		= array(
													'title'=>"Islam for Christians",
													'url'=>"https://www.islamforchristians.com",
													'logo'=>"islam_for_christians.png",
												);

// =================== English ===========================
if($opicifc_lang_list)
{
   foreach($opicifc_lang_list as $k => $val)
   {
        $opicifc_categories_lang[$k]['islam_for_christians']['url']  		    =  $val['link'];
        $opicifc_categories_lang[$k]['islam_for_christians']['cat'] 		    =  $val['link'].'/api/get_category_index/';
        $opicifc_categories_lang[$k]['islam_for_christians']['importurl'] 	    =  $val['link'].'/api/get_category_posts/?slug=';  
   }
}



?>