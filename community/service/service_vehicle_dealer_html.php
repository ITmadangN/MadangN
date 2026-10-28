<?php

namespace user_service;

use define_val;
use user_include\Pagination;
use Migliori\PowerLitePdo\Db;

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

class vehicle_dealer_html
{
    private Db $db;
    private define_val $define_val;
    private string $dealer_id = "";
    private string $regular_html_yn = "";

    public array $loop = array();

    public string $dealer_info ="";
    private string $tab_type = "";
    private string $preview = "";

    public string $html = "";

    public string $dealer_user_id = "";

    public function __construct(Db $db, define_val $define_val, array $fn_params) {

        $this->db = $db;
        $this->define_val = $define_val;

        $this->dealer_id = $fn_params['dealer_id'];
        $this->regular_html_yn = $fn_params['regular_html_yn'];
        $this->tab_type = $fn_params['tab_type'];
        $this->preview = $fn_params['preview'];

        $this->init();
    }

    private function init() {

        if($this->preview == "Y") {
            $row_sql = "SELECT A.* FROM community_car_dealers A where A.is_active = 1 or community_car_dealers_id = ". $this->dealer_id;
        }
        else {
            $row_sql = "SELECT A.* FROM community_car_dealers A where A.is_active = 1 and A.has_active_advertisement = 1 and A.is_approved =1";
        }
        $row_sql .= " order by A.community_car_dealers_id asc";

        $this->db->query($row_sql);

        $this->make_data();

        if($this->dealer_id != "") $this->get_dealer_info();
    }

    private function make_data() {

        $html = "";

        while ($row = $this->db->fetch()) {

            $blank_img = "/images/blank.png";
            if($row->logo_url != "" ) {
                $logo_img = $this->define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=logo&s=".$row->community_car_dealers_id;
            }
            else {
                $logo_img = $blank_img;
            }            

            $link = "/community/vehicle_dealer.php?dealer_id=".$row->community_car_dealers_id;

            if($this->dealer_id == $row->community_car_dealers_id) $on = "on"; else $on = "";

            $company_name = $row->company_name;
            // $company_name = TRUNCATE_TITLE($row->company_name, 6, "");

            $html .= '<li>
                <a href="javascript:return false;" onclick="goUrlDealer(\''.$link.'\');" class="text-none">
                    <div class="v-tab-item2 '.$on.'" style="padding-top:4px !important; padding-bottom:4px !important">
                        <img src="'.$logo_img.'" alt="" />
						<div class="v-tab-text2 '.$on.'  fs-7">
  <div class="v-tab-title">'.$company_name.'</div>
  <div class="v-tab-name text-truncate-1">'. $row->contact_name.'</div>
</div>
                        
                    </div>
                </a>
            </li>
            ';

        }

        if($this->regular_html_yn == "Y") {

            if($this->dealer_id == "") { $on = "on"; } else $on = "";

            $html .= '<li>
                        <a href="javascript:return false;" onclick="goUrl(\'/community/vehicle_regular.php\');">
                            <div class="v-tab-item2 '.$on.'"  style="padding-top:4px !important; padding-bottom:4px !important">
                                <div style="height:45px; display:flex; align-items:center; justify-content:center; color:#ccc;margin-bottom: 5px;">
                                    <i class="fa fa-car" style="font-size:28px;"></i> 
                                </div>
                                <div class="v-tab-text fs-7 text-\"-2 " style="padding-top:12px;" >개인매물</div>
                            </div>
                        </a>
                    </li>';

        }

        $this->html = $html;
    }

    private function get_dealer_info() {

        $row_sql = "SELECT A.* FROM community_car_dealers A where A.community_car_dealers_id = '{$this->dealer_id}'";

        $this->db->query($row_sql);

        $row = $this->db->fetch();

        $blank_img = "/images/blank.png";
        if($row->logo_url != "" ) {
            $logo_img = $this->define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=logo&s=".$row->community_car_dealers_id;
        }
        else {
            $logo_img = $blank_img;
        }

        if($row->main_image_url != "" ) {
            $main_img = $this->define_val->IMG_PROTECT ."?c=community&cc=vehicle_dealer&d=main&s=".$row->community_car_dealers_id;
        }
        else {
            $main_img = $blank_img;
        }

        $this->dealer_user_id = $row->user_id;

        $html = '<div class="block-content border p-2" style="border-top:2px solid #000 !important;">
                                    <div class="panel row child-cols-12 md:child-cols border-bottom pb-2">
                                        
                                        
                                        <div class="col-12 md:col-2 mt-narrow">
                                              <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="v-tab-item">
                                                           <img src="'.$logo_img.'" alt="" />
                                                            <div class="v-tab-text">'.$row->company_name.'</div>
                                                         </div>
                                                    </article>
                                                </div>
                                                
                                           </div>
                                           <div class="col-12 md:col-5 mt-1 rds">
                                            <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60 md:d-flex z-1">
                                                                        <div><i class="fa fa-building"></i></div>
                                                                        <div class="w-90px">회사명</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">'.$row->company_name.'</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                              <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div><i class="fa fa-user"></i></div>
                                                                        <div class="w-90px">딜러명</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">'.$row->contact_name.'</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                                 <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div><i class="fa fa-map-marker"></i></div>
                                                                        <div class="w-90px">거래지역</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">&nbsp;'. $row->city_name . ",". $row->state_code.'</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                               
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div><i class="fa fa-phone-square"></i></div>
                                                                        <div class="w-90px">연락처</div>
                                                                        <div class="text-primary text-opacity-80 fs-6"> <a class="text-none" href="tel:">'.$row->contact_phone.'</a></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                           </div>
                                    
                                            <div class="child-cols-12  md:col-5  mt-1">
                                             <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div><i class="fa fa-home"></i></div>
                                                                        <div class="w-90px">회사 웹사이트</div>
                                                                        <div class="text-primary text-opacity-80 fs-7"> <a class="text-none" href="'.$row->company_website.'" target="_blank">'.$row->company_website.'</a></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                 </div>
                                                  <div>
                                                    <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  md:d-flex z-1">
                                                                        <div><i class="fa fa-home"></i></div>
                                                                        <div class="w-90px">딜러 웹사이트</div>
                                                                        <div class="text-primary text-opacity-80 fs-7"> <a class="text-none" href="'.$row->dealer_website.'" target="_blank">'.$row->dealer_website.'</a></div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                 </div>
                                                <div>
                                                     <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  d-flex z-1">
                                                                        <div class="fs-5"><i class="fa fa-globe"></i></div>
                                                                        <div class="w-90px">주소</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-7">'.$row->listing_address1 .' '.$row->listing_address2.'</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                                <div>
                                                     <article class="post type-post panel uc-transition-toggle mt-1">
                                                        <div class="row child-cols g-2 uc-grid" data-uc-grid="">
                                                          <div class="post-header panel vstack justify-between gap-1">
                                                                    <div class="post-meta panel hstack justify-start gap-1 fs-6 fw-bold text-gray-900 text-opacity-60  d-flex z-1">
                                                                        <div class="fs-7"><i class="fa fa-envelope"></i></div>
                                                                        <div class="w-90px">이메일</div>
                                                                        <div class="text-gray-900 text-opacity-80 fs-6">'.$row->contact_email.'</div>
                                                                    </div>
                                                            </div>
                                                          </div>
                                                    </article>
                                                </div>
                                                 
                                              </div>
                                            
                                            </div><!-- Top Contents-->  

                                            <div class="mt-2 pt-1 pb-1">
                                                <div class="panel row child-cols-12 md:child-cols pb-2">
                                                   <div class="col-12 md:col-3 mt-narrow">
                                                      <div>
                                                          <article class="post type-post panel uc-transition-toggle">
                                                             <figure class="featured-image m-0 ratio ratio-3x4 uc-transition-toggle overflow-hidden bg-gray-25">
                                                              <img src="'.$main_img.'" data-src="'.$main_img.'" alt="image" data-uc-img="loading: lazy">
                                                              </figure>
                                                           </article>
                                                      </div>
                                                   </div>
                                                   <div class="child-cols-12 mt-narrow">
                                                      <div>
                                                         <article class="post type-post panel rds">
                                                           <p>

														'.nl2br($row->dealer_introduction).'


														</p>
                                                    </article>
                                                </div>
                                             </div>
                                          </div>
                                       </div><!-- Contents-->                                      
                                  </div>';

        $this->dealer_info = $html;

    }
}
