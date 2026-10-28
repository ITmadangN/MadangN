<?php

namespace service;

use define_val;
use include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

require_once "$DOCUMENT_ROOT/admin/include/pagination.php";

class news_list
{

    private Db $db;
    private int $page;

    private string $s_section = "";
    private string $s_kind = "";
    private string $s_is_active = "";
    private string $q_is_active = "";

    private string $s_keyword = "";
    private int $page_set;
    private int $block_set;

    private define_val $define_val;

    public array $loop = array();
    public string $paging;

    private string $q_keyword = "";
    private string $q_section = "";

    private int $no;
    
    public string $navigation_text = "";


    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;
        $this->page = $fn_params['page'];
        $this->s_is_active = $fn_params['s_is_active'];
        $this->s_section = $fn_params['s_section'];
        $this->s_kind = $fn_params['s_kind'];
        $this->s_keyword = $fn_params['s_keyword'];
        $this->page_set = $fn_params['page_set'];
        $this->block_set = $fn_params['block_set'];

        
        if($this->s_is_active != "-1" && $this->s_is_active != "") {

            $this->q_is_active = "AND A.is_active = '{$this->s_is_active}'";
        }

        
        if($this->s_section != "-1" && $this->s_section != "") {

            $this->q_section = "AND A.section = '{$this->s_section}'";
        }

        
        if($this->s_keyword != "") {

            $column = "A.title";

            switch($this->s_kind) {

                case "title": $column = "A.title"; break;
                case "content": $column = "A.content"; break;
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


        $count_sql = "SELECT count(*) as cnt
                        FROM news A  
                        WHERE 1 = 1                      
                        {$this->q_is_active} {$this->q_section}  {$this->q_keyword}
                        ";
                        
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

        $row_sql = "SELECT A.*
                        FROM news A
                        where 1 = 1
                        {$this->q_is_active} {$this->q_section}  {$this->q_keyword}
                        ";
                                
        $row_sql .= " order by DATE(A.report_date) desc, A.sort asc Limit ".$pagination->limit_regno.", ".$pagination->page_set;

        $this->db->query($row_sql);

        $this->make_data();

        $this->navigation_text = "총 (".number_format($pagination->getTotal(),0).")개 [전체 :".number_format($this->page,0)."/".number_format($pagination->getTotalPage(),0)."] 페이지";

    }

    private function make_data() {

        $k = 0;

        $no = $this->no;
        
        $data = array();
        
        while ($row = $this->db->fetch()) {
            
            $section = ARRAY_RETURN($this->define_val->DEFINE_news_section,$row->section);
            
            $is_active_img = "no-active";
            if($row->is_active == "1") $is_active_img = "completed";
            
            $link = "news_view.php?news_id=".$row->news_id;
                    
            $data[$k] = array('id' => $row->news_id, 'section' => $section,  'title' => $row->title, 'reporter_name' => $row->reporter_name, 'report_date' =>  DATETOSTRING_USA2($row->report_date,"/"),
            'active_img' => $is_active_img, 'is_active' => ARRAY_RETURN($this->define_val->DEFINE_is_active,$row->is_active), 'link' => $link, 'is_manual_input' => $row->is_manual_input, 'sort' => $row->sort);            

            $k++;

        }
        
        for ($i = 0; $i < count($data); $i++) {

            $id = $data[$i]['id'];
            $section = $data[$i]['section'];
            $title = $data[$i]['title'];
            $reporter_name = $data[$i]['reporter_name'];
            $report_date = $data[$i]['report_date'];
            $active_img = $data[$i]['active_img'];
            $is_active = $data[$i]['is_active'];
            $link = $data[$i]['link'];
            $is_manual_input = $data[$i]['is_manual_input'];
            $sort = $data[$i]['sort'];
            
            $sql = "SELECT img_url, caption FROM news_images WHERE news_id = ".$id." and can_use = 1 order by img_index asc limit 0,1";
            
            $row = $this->db->queryRow($sql, []);
            $img_url = $row->img_url;
            $caption = $row->caption;

            $img = "/images/blank.png";
            
            if($img_url != "") $img = $img_url;
            
            if($is_manual_input == 'Y') $img = $this->define_val->IMG_PROTECT . "?c=news&cc=news&d=img1&s=" . $id;

            $this->loop[$i] = array('T_NO' => $id,'T_LINK' => $link, 'T_IMG' => $img, 'T_SECTION' => $section , 'T_TITLE' => $title, 'T_REPORTER_NAME' => $reporter_name , 
                    'T_REPORT_DATE' => $report_date,'T_ACTIVE_IMG' => $active_img, 'T_IS_ACTIVE' => $is_active, 'T_SORT' => $sort);
             

            $k--;
        }
        

    }
    
}
