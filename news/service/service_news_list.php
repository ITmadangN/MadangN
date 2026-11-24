<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/include/Pagination.php";

class service_news_list
{

    private Db $db;
    private int $page;

    private string $section = "";
    private string $s_kind = "";

    private string $s_keyword = "";
    private string $random = "";
    private string $report_date = "";
    private string $image = '';
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_section = "";
    private string $q_report_date = "";

    private int $no;

    public string $navigation_text = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->section = $fn_params['section'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];        
        $this->random = $fn_params['random'];    
        $this->report_date  = $fn_params['report_date'];        
        $this->image  = $fn_params['image'];        

        $this->q_section = "AND section = '".$this->section."'";
        
        if($this->report_date != "") $this->q_report_date = "AND report_date >= '".$this->report_date." 00:00:00' AND report_date <= '".$this->report_date." 23:59:59'";
        
        if($this->s_keyword != "") {

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "content":  $column = "A.content"; break;
            }

            $temp = "%".$this->s_keyword."%";
            $this->q_keyword = "AND $column like '$temp'";

            if($this->s_kind == "") {
                $this->q_keyword = "AND (A.title like '$temp' OR A.content like '$temp')";
            }
        }

        $this->init();
    }

    private function init() {

        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            session_start();
        }

        // 드롭다운에서 ?region=NY 등으로 넘어온 경우 세션과 세션쿠키(만료=0) 즉시 갱신
        if (!empty($_GET['region'])) {
            $allowed = ['SOCAL', 'NY_NJ', 'CHICAGO', 'DC', 'TEXAS', 'SEATTLE', 'ATLANTA', 'ALABAMA'];
            $picked  = strtoupper(trim((string) $_GET['region']));
            if ($picked === 'CA') {
                $picked = 'SOCAL';
            } elseif ($picked === 'NY' || $picked === 'NJ') {
                $picked = 'NY_NJ';
            }
//            if (in_array($picked, $allowed, true)) {
//                $_SESSION['user_sub_region'] = $picked;
//            }
            if (in_array($picked, $allowed, true)) {
                $_SESSION['user_sub_region'] = $picked;
                if (function_exists('setMnSubRegionCookie')) {
                    setMnSubRegionCookie($picked);
                }
            }
        }


// 1. 현재 확정된 사용자 지역 가져오기
        $userRegion = strtoupper(trim((string) ($GLOBALS['CURRENT_SUB_REGION'] ?? ($_SESSION['user_sub_region'] ?? ($_COOKIE['mn_sub_region'] ?? 'SOCAL')))));

        // 2. 허용된 지역 코드 화이트리스트 검증 (SQL 인젝션 방지)
        $allowedRegions = ['LA', 'OC', 'SD', 'BAY', 'SOCAL', 'CA', 'NY_NJ', 'NY', 'NJ', 'CHICAGO', 'DC', 'TEXAS', 'SEATTLE', 'ATLANTA', 'ALABAMA'];
        if (!in_array($userRegion, $allowedRegions, true)) {
            $userRegion = 'SOCAL';
        }

        // 3. 선택한 지역 뉴스만 나오도록 WHERE 조건 생성
        if ($userRegion === 'SOCAL') {
            $q_region = " AND UPPER(IFNULL(A.sub_region, '')) IN ('LA', 'OC', 'SOCAL', 'CA') ";
        } elseif ($userRegion === 'NY_NJ' || $userRegion === 'NY' || $userRegion === 'NJ') {
            $q_region = " AND UPPER(IFNULL(A.sub_region, '')) IN ('NY', 'NJ') ";
        } else {
            $q_region = " AND UPPER(IFNULL(A.sub_region, '')) = '" . addslashes($userRegion) . "' ";
        }

//        // 4. 같은 날짜 내 우선순위 점수 (NY면 NY->NJ, NJ면 NJ->NY)
//        if ($userRegion === 'SOCAL') {
//            $regionPriorityExpr = "CASE WHEN UPPER(IFNULL(A.sub_region, '')) IN ('LA', 'OC', 'SOCAL', 'CA') THEN 2 ELSE 0 END";
//        } elseif ($userRegion === 'NY' || $userRegion === 'NJ') {
//            $secondRegion = ($userRegion === 'NY') ? 'NJ' : 'NY';
//            $regionPriorityExpr = "CASE
//                WHEN UPPER(IFNULL(A.sub_region, '')) = '{$userRegion}' THEN 2
//                WHEN UPPER(IFNULL(A.sub_region, '')) = '{$secondRegion}' THEN 1
//                ELSE 0
//            END";
//        } else {
//            $regionPriorityExpr = "CASE WHEN UPPER(IFNULL(A.sub_region, '')) = '" . addslashes($userRegion) . "' THEN 2 ELSE 0 END";
//        }



//        saveLog("$regionPriorityExpr : ",$regionPriorityExpr);
//        $count_sql = "SELECT count(*) as cnt from news A where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date}";
        if($this->section  != 'local') {
            $count_sql = "SELECT count(*) as cnt from news A 
                          join (   select news_id 
                                   from news_images 
                                   where ifnull(img_url,'') <> '' 
                                   and can_use = 1 
                                   group by news_id ) B on B.news_id = A.news_id
                          where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date} ";
        }
        else {
            $count_sql = "SELECT count(*) as cnt from news A
                          where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date} {$q_region}";
//            $count_sql = "SELECT count(*) as cnt from news A
//                          where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date} ";
        }

//        saveLog("count_sql : ",$count_sql);
        $pagination = new Pagination(
            $this->db,
            $count_sql,
            '',
            $this->page,
            $this->page_set,
            $this->block_set
        );

        $this->paging = $pagination->Print_Paging();
        $this->no = $pagination->no;

//        $row_sql = "SELECT A.* FROM news A where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date}";
        if($this->section  != 'local') {
            $row_sql = "SELECT A.*
                        FROM news A
                        join ( select news_id
                               from news_images
                               where ifnull(img_url,'') <> ''
                               and can_use = 1
                               group by news_id ) B on B.news_id = A.news_id
                        where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date}";
        }
        else{
            $row_sql = "SELECT A.*
                        FROM news A
                        where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date} {$q_region}";
//            $row_sql = "SELECT A.*
//                        FROM news A
//                        where A.is_active = 1 and A.can_use = 1 {$this->q_section} {$this->q_keyword} {$this->q_report_date} ";

        }
        //if($this->random == "Y") $row_sql .= " order by RAND()";
//        if($this->random == "Y") $row_sql .= " order by (A.report_date) desc, A.sort asc";
//        else $row_sql .= " order by (A.report_date) desc, A.sort asc";
        if($this->random == "Y") $row_sql .=" ORDER BY A.report_date DESC, A.news_id DESC";
        else $row_sql .= " ORDER BY   A.report_date DESC, A.news_id DESC";
        
        $row_sql .= " Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        if($this->section=='local'){
            saveLog("SQL : ",$row_sql);
        }

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";


    }


    private function make_data() {

        $i = 0;

        $no = $this->no;
        
        $data = array();

        while ($row = $this->db->fetch()) {

           $view = "";

           switch($row->section) {
               case "so" : $view = "society_view"; break;
               //case "lo" : $view = "local_view"; break;
               case "lo" : $view = "global_view"; break;
               case "pe" : $view = "political_economy_view"; break;
               case "en" : $view = "entertainment_view"; break;
               case "st" : $view = "sports_view"; break;
               case "local" : $view = "localnews_view"; break;
           }

           $link = "/news/".$view.".php?id=" . $row->news_id;

           $data[$i] = array('no' => $no,'id' => $row->news_id, 'link' => $link, 'title' => $row->title , 'content' => $row->content, 'report_date' => DATETOSTRING_USA2($row->report_date, "/"), 'reporter_name' => $row->reporter_name,
                'view_count' => $row->view_count, 'create_at' => DATETOSTRING_USA2($row->created_at,"/"),  'created_user' => $row->created_user, 'is_manual_input' => $row->is_manual_input, 'source' => $row->source);

           $i++;
           $no--;
        }
        
        $cnt = 0;
        
        for ($i = 0; $i < count($data); $i++) {

            $no = $data[$i]['no'];
            $id = $data[$i]['id'];
            $link = $data[$i]['link'];
            $title = $data[$i]['title'];
            $content = $data[$i]['content'];
            $report_date = $data[$i]['report_date'];
            $reporter_name = $data[$i]['reporter_name'];         
            $view_count = $data[$i]['view_count'];
            $create_at = $data[$i]['create_at'];            
            $created_user = $data[$i]['created_user'];
            $is_manual_input = $data[$i]['is_manual_input'];
            $source = $data[$i]['source'];
             
            $sql = "SELECT img_url FROM news_images WHERE can_use = 1 AND news_id = ".$id." AND img_url <> '' order by news_image_id asc limit 0,1";

            $row = $this->db->queryRow($sql, []);
            $image_url = $row->img_url;

            if($this->section  != 'local') {
                // 무조건 이미지 있는것만 사용
                if ($this->image == 'Y' && ($image_url == '' || strpos($image_url, 'www.youtube.com') !== false)) continue;
            }

            $news_img = "/images/blank.png";
            if ($image_url != "") $news_img = $image_url;
            
//            if($is_manual_input == 'Y') $news_img = $this->define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $id;
            if($is_manual_input == 'Y' || $source == 'AI') $news_img = $this->define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $id;
//            if ($id == 29601 || $id == 28212){
//                saveLog("$source : ",$source);
//                saveLog("id : ",$news_img);
//            }
            $content = str_replace('__IMG1__', '', $content);
            $content = str_replace('__IMG2__', '', $content);
            $content = str_replace('__IMG3__', '', $content);
            $content = str_replace('__IMG4__', '', $content);
            $content = str_replace('__IMG5__', '', $content);
            $content = trim(preg_replace('/\s+/', ' ', strip_tags($content)));

            $this->loop[$cnt] = array('T_NO' => $no,'T_LINK' => $link, 'T_IMG' => $news_img, 'T_TITLE' => $title , 'T_CONTENT' => $content, 'T_REPORT_DATE' => $report_date, 'T_REPORTER_NAME' => $reporter_name,
                'T_VIEW_COUNT' => $view_count, 'T_CREATE_AT' => $create_at,  'T_CREATED_USER' => $created_user);
     
            $cnt++;
        }

    }
}


