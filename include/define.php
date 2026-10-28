<?php

class define_val {


    // 암호화 키 (16, 24 또는 32 바이트 여야 함)
    public string $CRYPT_KEY = "madangn20251205#"; // 강력한 키 사용 권장
    public string $CRYPT_METHOD = "AES-256-CBC";
    
    // 부동산 회사 대표 전달 이메일
    public string $REALESATE_EMAIL = 'it@madangn.com';
    
    // 자동차 허위 판매 신고
    public string $CAR_FALSE_EMAIL = 'it@madangn.com';
    
    // 유료결제애 대해서 결제를 타야 할지 말지 결정
    public string $PAY_YN_RECRUIT_PLATINUM = 'Y';
    public string $PAY_YN_RECRUIT_GOLD = 'N';
    public string $PAY_YN_BUSINESS = 'N';
    public string $PAY_YN_CAR_DEALER = 'N';
    public string $PAY_YN_AGENT = 'N';
    public string $PAY_YN_BANNER = 'N';
    
    public string $MADANGN_URL = "https://www.madangn.com";
    public string $BASE_DIR = "/mnt/www";

    // 보안을 위해 이미지 직접접근 제한
    public string $IMG_PROTECT = "/secret/img_protect.php";

    public string $DEFAULT_BUSINESS_HOME = "/community/business.php";
    public string $DEFAULT_MARKET_HOME = "/community/market.php";
    public string $DEFAULT_RECRUIT_HOME = "/community/recruit.php";

    public string $DEFAULT_VEHICLE_HOME = "/community/vehicle.php";

    public string $DEFAULT_MARKETSALE_HOME = "/community/marketsale.php";
    public string $DEFAULT_NOTIFICATION_HOME = "/towninfo/notification.php";
    public string $DEFAULT_FIND_PEOPLE_HOME = "/towninfo/find_people.php";

    public string $DEFAULT_EVENT_HOME = "/towninfo/event.php";
    
    public string $DEFAULT_REALESTATE_HOME = "/realestate/";

    public array $DEFINE_common_blank = array('','전체');
    public array $DEFINE_youtube_channel         = array('','전체','UCjcsgya3C8krj-uo24PgxAw','마당N MadangN','UC38ZF45c2L9VmJBAJmjL4Jw','Spoon TV');

    public array $DEFINE_is_active               = array('','전체','1','Active','0','Inactive');    
    
    public array $DEFINE_is_active_YN               = array('','전체','Y','Active','N','Inactive');    
    
    public array $DEFINE_is_default               = array('','전체','1','default','0','not default');    

    public array $DEFINE_youtube_category1       = array('','전체','madangntv','MadangN TV','insure','재정/보험','realstate','부동산','rogg','ROGG');

    public array $DEFINE_youtube_category2     = array(
                                                    'madangntv' => array('','전체','miburi','미부리','nowusa','지금미국','cafe','미국지식카페','people','보통이 아닌 사람들','heart','마음이 왜이래','mshorts','마당앤쇼츠'),
                                                    'insure' => array('','전체','unity','유니티','bridgeone','브리지원','money','재정의달인','medicare','메디케어','obama','오바마케어','moneywise','머니와이즈','ishorts','재정/보험 쇼츠'),
                                                    'realstate' => array('','전체','cbr','Coldwell Banker Best Realty'),
                                                    'rogg' => array('','전체','styb','Save This Yellow Bus','rogg','ROGG 아이티 선교기')
                                                 );



/*public array  $DEFINE_youtube_category2_madangntv     = array('','전체','miburi','미부리','nowusa','지금미국','cafe','미국지식카페','people','보통이 아닌 사람들','heart','마음이 왜이래','mshorts','마당앤쇼츠');
public array $DEFINE_youtube_category2_insure        = array('','전체','unity','유니티','bridgeone','브리지원','money','재정의달인','medicare','메디케어','obama','오바마케어','moneywise','머니와이즈','ishorts','재정/보험 쇼츠');
public array $DEFINE_youtube_category2_realstate     = array('','전체','cbr','Coldwell Banker Best Realty');
public array $DEFINE_youtube_category2_rogg          = array('','전체','styb','Save This Yellow Bus','donation','나눌레이','rogg','ROGG 아이티 선교기');*/

    public array $DEFINE_status_yn                    = array('','전체','1','Y','2','N');
    
    public array $DEFINE_confirm_yn                    = array('','전체','1','승인','0','대기중');
    
    public array $DEFINE_yn                    = array('','전체','Y','Y','N','N');

    public array $DEFINE_blank       = array('','전체');

    public array $DEFINE_list_count = array('10','10줄','20','20줄','30','30줄','50','50줄','100','100줄');

    public string $DEFINE_IP_ADDRESS = "";

    public array $DEFINE_recruit_advertising_level = array('','전체','platinum','platinum','gold','gold','regular','regular');
    public array $DEFINE_recruit_advertising_level_TEXT = array('','전체','platinum','PLATINUM','gold','GOLD','regular','일반');

    public array $DEFINE_recruit_job_type                    = array('','전체','office','사무직','education','교육직','professional','전문직','technical','기술직','it','IT','marketing','마케팅','sales','영업직','service','서비스직','other','기타');

    public array $DEFINE_recruit_s_kind = array('','전체','title','제목','content','내용','company_name','회사명');
    public array $DEFINE_market_s_kind = array('','전체','title','제목','content','내용');
    public array $DEFINE_market_users_s_kind = array('','전체','user_id','사용자 ID');

    public array $DEFINE_market_listing_type = array('','전체','market','벼룩시장','msale','무빙세일','donation','무료드림','wanted','구합니다.','coupon','세일쿠폰');

    public array $DEFINE_market_marketplace_type     = array(
        'market' => array('','전체','book','서적','instruments','악기','accessories','악세사리','cloth','의류/패션','exercise','운동관련','kids','kids','cosmetics','화장품','etc','기타'),
        'msale' => array('','전체','furniture','가구','instruments','악기','electronics','전자제품','etc','기타'),
        'donation' => array('','전체','furniture','가구','instruments','악기','electronics','전자제품','etc','기타'),
        'wanted' => array('','전체','0','없음'),
        'coupon' => array('','전체','0','없음'),
    );

    public array $DEFINE_business_type = array('','전체','organization','기관단체','build','건축/공사/운송','academy','교육','loan','대출/융자','beauty','미용/뷰티/건강','law','법률','tax','세무/회계','restaurant','식당/카페','visa','이민/비자','travel','여행','medical','의료','etc','기타');

    public array $DEFINE_business_s_kind = array('','전체','title','제목','content','내용');

    // public array $DEFINE_business_type = array('','전체','lawyer','변호사','legal_services','법률서비스','translation','번역/공증','architecture','건축/공사.','medical','의료/건강','beauty','미용/패션');

    public array $DEFINE_vehicle_dealer_s_kind = array('','전체','name','딜러명','company_name','회사이름','user_id','사용자 id');
    public array $DEFINE_vehicle_car_maker = array(
    '', '전체',
    'Acura', '아큐라',
    'Alfa Romeo', '알파 로메오',
    'Aston Martin', '애스턴 마틴',
    'Audi', '아우디',
    'Bentley', '벤틀리',
    'BMW', 'BMW',
    'Buick', '뷰익',
    'Cadillac', '캐딜락',
    'Chevrolet', '쉐보레',
    'Chrysler', '크라이슬러',
    'Dodge', '닷지',
    'Ferrari', '페라리',
    'FIAT', '피아트',
    'Ford', '포드',
    'Genesis', '제네시스',
    'GMC', 'GMC',
    'Honda', '혼다',
    'Hyundai', '현대',
    'INFINITI', '인피니티',
    'Jaguar', '재규어',
    'Jeep', '지프',
    'Kia', '기아',
    'Lamborghini', '람보르기니',
    'Land Rover', '랜드로버',
    'Lexus', '렉서스',
    'Lincoln', '링컨',
    'Lotus', '로터스',
    'Lucid', '루시드',
    'Maserati', '마세라티',
    'Mazda', '마쯔다',
    'McLaren', '맥라렌',
    'Mercedes-Benz', '메르세데스-벤츠',
    'MINI', '미니',
    'Mitsubishi', '미쓰비시',
    'Nissan', '닛산',
    'Polestar', '폴스타',
    'Porsche', '포르쉐',
    'Ram', '램',
    'Rivian', '리비안',
    'Rolls-Royce', '롤스로이스',
    'Subaru', '스바루',
    'Tesla', '테슬라',
    'Toyota', '토요타',
    'Volkswagen', '폭스바겐',
    'Volvo', '볼보',
    'VinFast', '빈패스트',
    'Others', '기타'
);

public array $DEFINE_vehicle_car_maker_eng = array(
    '', 'All',
    'Acura', 'Acura',
    'Alfa Romeo', 'Alfa Romeo',
    'Aston Martin', 'Aston Martin',
    'Audi', 'Audi',
    'Bentley', 'Bentley',
    'BMW', 'BMW',
    'Buick', 'Buick',
    'Cadillac', 'Cadillac',
    'Chevrolet', 'Chevrolet',
    'Chrysler', 'Chrysler',
    'Dodge', 'Dodge',
    'Ferrari', 'Ferrari',
    'FIAT', 'FIAT',
    'Ford', 'Ford',
    'Genesis', 'Genesis',
    'GMC', 'GMC',
    'Honda', 'Honda',
    'Hyundai', 'Hyundai',
    'INFINITI', 'INFINITI',
    'Jaguar', 'Jaguar',
    'Jeep', 'Jeep',
    'Kia', 'Kia',
    'Lamborghini', 'Lamborghini',
    'Land Rover', 'Land Rover',
    'Lexus', 'Lexus',
    'Lincoln', 'Lincoln',
    'Lotus', 'Lotus',
    'Lucid', 'Lucid',
    'Maserati', 'Maserati',
    'Mazda', 'Mazda',
    'McLaren', 'McLaren',
    'Mercedes-Benz', 'Mercedes-Benz',
    'MINI', 'MINI',
    'Mitsubishi', 'Mitsubishi',
    'Nissan', 'Nissan',
    'Polestar', 'Polestar',
    'Porsche', 'Porsche',
    'Ram', 'Ram',
    'Rivian', 'Rivian',
    'Rolls-Royce', 'Rolls-Royce',
    'Subaru', 'Subaru',
    'Tesla', 'Tesla',
    'Toyota', 'Toyota',
    'Volkswagen', 'Volkswagen',
    'Volvo', 'Volvo',
    'VinFast', 'VinFast',
    'Others', 'Others'
);

    public array $DEFINE_vehicle_admin_s_kind = array('','전체','name','판매자','description','내용','year','자동차 연식');
    public array $DEFINE_is_dealer_yn = array('','전체','Y','딜러','N','일반');
    
    public array $DEFINE_behicle_s_kind = array('','전체','options_description','옵션','description','내용');
    public array $DEFINE_vehicle_fuel_type = array('','전체','gas','가솔린','hd','하이브리드','electric','전기','diesel','디젤');    
    public array $DEFINE_vehicle_car_color = array(
    '', '전체',
    'white', '흰색',
    'black', '검정',
    'silver/gray', '은색/회색',
    'green', '녹색',
    'red', '빨강',
    'dark gray', '쥐색',
    'purple', '보라색',
    'blue', '청색',
    'other', '기타'
);
    public array $DEFINE_vehicle_body_type = array(
    '', '전체',
    'convertibles', '오픈카/컨버터블',
    'crossover', '크로스오버',
    'luxury cars', '럭셔리카',
    'minivans and vans', '미니밴/밴',
    'pickup trucks', '픽업트럭',
    'sedans and coupes', '세단/쿠페',
    'suv', 'SUV',
    'sports cars', '스포츠카',
    'wagons', '왜건',
    '4wd/awd', '사륜구동',
    'diesel engines', '디젤',
    'hybrids', '하이브리드',
    'hatchbacks', '해치백',
    'other', '기타'
);

    public array $DEFINE_vehicle_transmission = array('','전체','automatic','자동','manual','수동');

    public array $DEFINE_find_people_category = array('','전체','family','가족','buddy','동기', 'alumni','동문','acquaintance','지인','friend','친구','etc','기타');

    public array $DEFINE_find_people_s_kind = array('','전체','title','제목','description','내용');

    public array $DEFINE_event_s_kind = array('','전체','title','제목','description','내용');

    public array $DEFINE_notification_category = array('','전체','institutional','기관단체','alumni','동문회','동호회','동호회','festival','문화축제','seminar','세미나','exhibition','전시회','convention','컨벤션','etc','기타');

    public array $DEFINE_notification_s_kind = array('','전체','title','제목','description','내용');
    public array $DEFINE_ad_company_s_kind  = array('','전체','company','회사명','name','담당자','email','이메일','phone','연락처');
    
    public array $DEFINE_ad_company_used_type  = array('','전체','recruit','구인회사','business','비지니스홍보회사');

    public array $DEFINE_messages_s_kind = array('','전체','title','제목','content','내용');

    public array $DEFINE_marketsale_flyer_s_kind = array('','전체','title','제목','description','설명');
    
    public array $DEFINE_marketsale_market_s_kind = array('','전체','market_name','마켓명');

    public array $DEFINE_marketsale_branch_s_kind = array('','전체','contact_name','담당자','branch_name','지점명');

    public array $DEFINE_branch_display_method = array('','전체','1','카운티','2','도시');


    public array $DEFINE_section_type = array('','전체','1','구인구직','2','비지니스','3','자동차 딜러');

    public array $DEFINE_is_paid = array('','전체','Y','결제완료','N','미결제');

    public array $DEFINE_validity_period = array('','전체','1','1개월','3','3개월','6','6개월');

    public array $DEFINE_pay_kind = array('','전체', 'company_name','회사명','title','제목','user_id','사용자 id','contact_name','담당자','desired_start_date','광고 희망게시일','start_date','광고 게시일');
    
    public array $DEFINE_dealer_pay_kind = array('','전체', 'company_name','회사명','user_id','사용자 id','contact_name','딜러명','desired_start_date','광고 희망게시일','start_date','광고 게시일');
    
    public array $DEFINE_agent_pay_kind = array('','전체','id','유저 ID', 'name','에이전트명','dre','DRE Lic#','desired_start_date','광고 희망게시일','start_date','광고 게시일');
    
    public array $DEFINE_car_accident_history = array('','전체','Y','사고차량','N','무사고');
    
    public array $DEFINE_realstate_property_type = array('','전체','ResidentialLease','ResidentialLease','Residential','Residential','Land','Land','CommercialSale','CommercialSale','CommercialLease','CommercialLease','BusinessOpportunity','BusinessOpportunity','ManufacturedInPark','ManufacturedInPark','ResidentialIncome','ResidentialIncome');
    

    public array $DEFINE_news_section = array('','전체','so','사회','lo','세계','pe','정치/경제','en','연예','st','스포츠');
    
    public array $DEFINE_news_s_kind = array('','전체','title','제목','content','내용');
    
    public array $DEFINE_realestate_property_type = array('','전체','House','주택','Rental','렌탈','Commercial','커머셜','Business','사업체');

    public array $DEFINE_realestate_property_sub_type     = array(
        'House' => array('', '전체', 'Apartment', 'Apartment', 'BoatSlip', 'BoatSlip', 'Cabin', 'Cabin', 'CoOwnership', 'CoOwnership', 'Condominium', 'Condominium', 'DeededParking', 'DeededParking', 'Duplex', 'Duplex', 'Farm', 'Farm', 'Loft', 'Loft', 'ManufacturedHome', 'ManufacturedHome', 'ManufacturedOnLand', 'ManufacturedOnLand', 'MixedUse', 'MixedUse', 'MobileHome', 'MobileHome', 'OwnYourOwn', 'OwnYourOwn', 'Quadruplex', 'Quadruplex', 'SingleFamilyResidence', 'SingleFamilyResidence', 'StockCooperative', 'StockCooperative', 'Studio', 'Studio', 'Timeshare', 'Timeshare', 'Townhouse', 'Townhouse', 'Triplex', 'Triplex'),
        'Rental' => array('', '전체', 'Agriculture', 'Agriculture', 'Apartment', 'Apartment', 'BoatSlip', 'BoatSlip', 'Business', 'Business', 'Cabin', 'Cabin', 'CoOwnership', 'CoOwnership', 'Condominium', 'Condominium', 'DeededParking', 'DeededParking', 'Duplex', 'Duplex', 'Farm', 'Farm', 'HotelMotel', 'HotelMotel', 'Industrial', 'Industrial', 'Loft', 'Loft', 'ManufacturedHome', 'ManufacturedHome', 'ManufacturedOnLand', 'ManufacturedOnLand', 'MixedUse', 'MixedUse', 'MobileHome', 'MobileHome', 'MultiFamily', 'MultiFamily', 'Office', 'Office', 'OwnYourOwn', 'OwnYourOwn', 'Quadruplex', 'Quadruplex', 'Ranch', 'Ranch', 'Retail', 'Retail', 'RoomingHouse', 'RoomingHouse', 'SingleFamilyResidence', 'SingleFamilyResidence', 'SpecialPurpose', 'SpecialPurpose', 'StockCooperative', 'StockCooperative', 'Studio', 'Studio', 'Timeshare', 'Timeshare', 'Townhouse', 'Townhouse', 'Triplex', 'Triplex', 'UnimprovedLand', 'UnimprovedLand', 'Warehouse', 'Warehouse', 'WaterPositionWithLand', 'WaterPositionWithLand'),
        'Commercial' => array('', '전체', 'Agriculture', 'Agriculture', 'Apartment', 'Apartment', 'Business', 'Business', 'Cabin', 'Cabin', 'CoOwnership', 'CoOwnership', 'Condominium', 'Condominium', 'DeededParking', 'DeededParking', 'Duplex', 'Duplex', 'Farm', 'Farm', 'HotelMotel', 'HotelMotel', 'Industrial', 'Industrial', 'Loft', 'Loft', 'ManufacturedHome', 'ManufacturedHome', 'ManufacturedOnLand', 'ManufacturedOnLand', 'MixedUse', 'MixedUse', 'MobileHome', 'MobileHome', 'MultiFamily', 'MultiFamily', 'Office', 'Office', 'OwnYourOwn', 'OwnYourOwn', 'Quadruplex', 'Quadruplex', 'Ranch', 'Ranch', 'Retail', 'Retail', 'SingleFamilyResidence', 'SingleFamilyResidence', 'SpecialPurpose', 'SpecialPurpose', 'StockCooperative', 'StockCooperative', 'Studio', 'Studio', 'Timeshare', 'Timeshare', 'Townhouse', 'Townhouse', 'Triplex', 'Triplex', 'UnimprovedLand', 'UnimprovedLand', 'Warehouse', 'Warehouse'),
        'Business' => array('','전체','MixedUse','MixedUse','SingleFamilyResidence','SingleFamilyResidence')
    );
    
    public array $DEFINE_realestate_property_sub_type_all = array('', '', 'Agriculture', 'Agriculture', 'Apartment', 'Apartment', 'BoatSlip', 'BoatSlip', 'Business', 'Business', 'Cabin', 'Cabin', 'Condominium', 'Condominium', 'CoOwnership', 'CoOwnership', 'DeededParking', 'DeededParking', 'Duplex', 'Duplex', 'Farm', 'Farm', 'HotelMotel', 'HotelMotel', 'Industrial', 'Industrial', 'Loft', 'Loft', 'ManufacturedHome', 'ManufacturedHome', 'ManufacturedOnLand', 'ManufacturedOnLand', 'MixedUse', 'MixedUse', 'MobileHome', 'MobileHome', 'MultiFamily', 'MultiFamily', 'Office', 'Office', 'OwnYourOwn', 'OwnYourOwn', 'Quadruplex', 'Quadruplex', 'Ranch', 'Ranch', 'Retail', 'Retail', 'RoomingHouse', 'RoomingHouse', 'SingleFamilyResidence', 'SingleFamilyResidence', 'SpecialPurpose', 'SpecialPurpose', 'StockCooperative', 'StockCooperative', 'Studio', 'Studio', 'Timeshare', 'Timeshare', 'Townhouse', 'Townhouse', 'Triplex', 'Triplex', 'UnimprovedLand', 'UnimprovedLand', 'Warehouse', 'Warehouse', 'WaterPositionWithLand', 'WaterPositionWithLand');
    
    public array $DEFINE_realestate_s_kind = array('','전체','build','건축년도','bed','침실수','bath','욕실수');

    public array $DEFINE_agent_s_kind = array('','전체','id','사용자 ID','name','에이전트명','office_name','회사명');
    
    public array $DEFINE_memo_type = array('','전체','recipient','받은 쪽지','sender','보낸 쪽지');
    
    public array $DEFINE_user_s_kind = array('','전체','name','이름','email','이메일','phone','연락처');
    
    public array $DEFINE_user_permission_group_id = array('','전체','0','일반사용자','10','일반관리자','30','관리자');
    
    public array $DEFINE_user_is_letter_receive = array('','전체','1','Yes','0','No');
    
    public array $DEFINE_user_type = array('','전체','0','N','1','Y');
    
    public array $DEFINE_user_log_s_kind = array('','전체','user_id','유저 ID','ip','ip address');
    
    public array $DEFINE_realestate_standard_status = array('','전체','Active','Active','ComingSoon','ComingSoon');
    
    public array $DEFINE_realestate_lassociation_fee_frequency = array('','전체','Annually','Annually','Bi-Monthly','Bi-Monthly','Monthly','Monthly','One Time','One Time','Quarterly','Quarterly','SemiAnnually','SemiAnnually','Weekly','Weekly');
    
    public array $DEFINE_realestate_lease_amount_frequency = array('','전체','Annual','Annual','Monthly','Monthly','Weekly','Weekly');
    
//    public array $DEFINE_realestate_is_preminum_agent = array('','전체','1','TOP 10','0','Others');
    
//    public array $DEFINE_realestate_has_active_listings = array('','전체','0','매물 없음','1','매물 있음');
    
    public array $DEFINE_specialized_field = array(
    '', '없음',
    'h', '주택 전문',
    's', '상가 전문',
    'hs', '주택, 상가 전문',
    'ha', '주택, 경매 전문',
    'sl', '상가, 리스팅 전문',
    'hl', '주택, 리스팅 전문',
    'hsl', '주택, 상가, 리스팅 전문',
    'hbl', '주택, 사업체, 리스팅 전문',
    'hsm', '주택, 상가, 호텔/모텔, 리스팅 전문',
    'hsbl', '주택, 상가, 사업체, 리스팅 전문',
    'hsbml', '주택, 상가, 사업체, 부동산관리, 리스팅 전문',
    'hsmbml', '주택, 상가, 호텔/모텔, 부동산관리, 리스팅 전문'
    );        
    
    public array $DEFINE_banner_type = array(
    '', '전체',
    'banner_home', 'HOME',
    'banner_newshome', '뉴스홈',
    'banner_news', '뉴스',
    'banner_youtube', '유튜브',
    'banner_community', '커뮤니티',
    'banner_town', '타운정보',
    'banner_realestate', '부동산'
    );      
    
    public array $DEFINE_banner_pay_kind = array('','전체', 'company_name','회사명','user_id','사용자 id','contact_name','담당자','desired_start_date','광고 희망게시일','start_date','광고 게시일');
    
    public array $DEFINE_permission_group_s_kind = array('','전체','name','그룹명');
    
    public array $DEFINE_advertisement_type = array('','전체','1','구인구인 Platinum','2','구인구직 Gold','3','비지니스', '4','자동차 딜럭','5','부동산 Agent','6','이미지 배너광고');
    
    public array $DEFINE_realestate_bedrooms_total;
    public array $DEFINE_realestate_bathrooms_total;
    
    public function __construct(string $ip_address) {
        $this->DEFINE_IP_ADDRESS = $ip_address;
        $this->DEFINE_vehicle_car_year = $this->get_car_year();
        $this->DEFINE_realestate_bedrooms_total = $this->get_1_20();
        $this->DEFINE_realestate_bathrooms_total = $this->get_1_20();
    }

    private function get_car_year() {

        $return_value = array('','전체');

        $j = 2;
        for($i=2026;$i>=1980;$i--) {

            $return_value[$j] = "$i";
            $return_value[$j+1] = "$i";

            $j = $j + 2;
        }

        return $return_value;
    }
    
    private function get_1_20() {

        $return_value = array('','전체');

        $j = 2;
        for($i=1;$i<=22;$i++) {

            $return_value[$j] = "$i";
            $return_value[$j+1] = "$i"."개";

            $j = $j + 2;
        }

        return $return_value;
    }


}


$define_val = new define_val($_SERVER['REMOTE_ADDR']);
