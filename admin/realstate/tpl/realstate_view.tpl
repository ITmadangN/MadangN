<!-- INCLUDE FILE '../include/header.php' -->
<link rel="stylesheet" href="../css/iibiz_form.css"/>
<style>
.field-name {
    font-size: 0.9em;
    color: #555e6e;
    font-weight: 600;
    letter-spacing: 0;
}
</style>

<div class="row mt-2">
    <div class="col">

        <!-- 매물 배너 -->
        <div class="detail-card">
            <div class="detail-company-banner">
                <div class="detail-company-avatar"></div>
                <div>
                    <div class="detail-company-name">{{T_UNPARSED_ADDRESS}}</div>
                    <div class="detail-company-meta">부동산 매물 상세 정보</div>
                </div>
            </div>
            <div class="detail-loop-row">
                <span class="detail-loop-label">매물 상태</span>
                <!-- LOOP START 'T_LOOP' -->
                <span class="detail-level-badge">{{T_LOOP.T_STANDARD_STATUS}} / {{T_LOOP.T_PROPERTY_TYPE}}</span>
                <!-- LOOP END 'T_LOOP' -->
            </div>
        </div>

        <!-- 매물 기본 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">매물 기본 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">매물 고유 KEY <span class="field-name">(listing_key)</span></div>
                    <div class="detail-field-value">{{T_LISTING_KEY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">MLS 번호 <span class="field-name">(listing_id)</span></div>
                    <div class="detail-field-value">{{T_LISTING_ID}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">표준 상태 <span class="field-name">(standard_status)</span></div>
                    <div class="detail-field-value">{{T_STANDARD_STATUS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">MLS 내부 상태 <span class="field-name">(mls_status)</span></div>
                    <div class="detail-field-value">{{T_MLS_STATUS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">부동산 타입 <span class="field-name">(property_type)</span></div>
                    <div class="detail-field-value">{{T_PROPERTY_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">세부 타입 <span class="field-name">(property_sub_type)</span></div>
                    <div class="detail-field-value">{{T_PROPERTY_SUB_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">특수 판매 조건 <span class="field-name">(special_listing_conditions)</span></div>
                    <div class="detail-field-value">{{T_SPECIAL_LISTING_CONDITIONS}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">임대 기간 조건 <span class="field-name">(lease_term)</span></div>
                    <div class="detail-field-value">{{T_LEASE_TERM}}</div>
                </div>
                <!--div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">리스팅 계약일 <span class="field-name">(Listing Contract Date)</span></div>
                    <div class="detail-field-value">{{T_LISTING_CONTRACT_DATE}}</div>
                </div-->                
            </div>
        </div>

        <!-- 가격 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">가격 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">현재 등록 가격 <span class="field-name">(list_price)</span></div>
                    <div class="detail-field-value">{{T_LIST_PRICE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">최초 등록 가격 <span class="field-name">(original_list_price)</span></div>
                    <div class="detail-field-value">{{T_ORIGINAL_LIST_PRICE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">실거래 완료 가격 <span class="field-name">(close_price)</span></div>
                    <div class="detail-field-value">{{T_CLOSE_PRICE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">㎡당 가격 <span class="field-name">(price_per_sqft)</span></div>
                    <div class="detail-field-value">{{T_PRICE_PER_SQFT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">HOA 월 관리비 <span class="field-name">(association_fee)</span></div>
                    <div class="detail-field-value">{{T_ASSOCIATION_FEE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">HOA 납부 주기 <span class="field-name">(association_fee_frequency)</span></div>
                    <div class="detail-field-value">{{T_ASSOCIATION_FEE_FREQUENCY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">HOA 포함 항목 <span class="field-name">(association_fee_includes)</span></div>
                    <div class="detail-field-value">{{T_ASSOCIATION_FEE_INCLUDES}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">연간 재산세 <span class="field-name">(tax_annual_amount)</span></div>
                    <div class="detail-field-value">{{T_TAX_ANNUAL_AMOUNT}}</div>
                </div>
            </div>
        </div>

        <!-- 임대 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">임대 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">임대료 <span class="field-name">(lease_rate)</span></div>
                    <div class="detail-field-value">{{T_LEASE_RATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">임대료 유형 <span class="field-name">(lease_rate_type)</span></div>
                    <div class="detail-field-value">{{T_LEASE_RATE_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">임대료 납부 주기 <span class="field-name">(lease_rate_frequency)</span></div>
                    <div class="detail-field-value">{{T_LEASE_RATE_FREQUENCY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">임대 금액 <span class="field-name">(lease_amount)</span></div>
                    <div class="detail-field-value">{{T_LEASE_AMOUNT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">임대 금액 주기 <span class="field-name">(lease_amount_frequency)</span></div>
                    <div class="detail-field-value">{{T_LEASE_AMOUNT_FREQUENCY}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">임대 면적 <span class="field-name">(lease_square_feet)</span></div>
                    <div class="detail-field-value">{{T_LEASE_SQUARE_FEET}}</div>
                </div>
            </div>
        </div>

        <!-- 주소 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">주소 정보</div>
            <div class="detail-grid">
                <div class="detail-field full">
                    <div class="detail-field-label">전체 주소 <span class="field-name">(unparsed_address)</span></div>
                    <div class="detail-field-value">{{T_UNPARSED_ADDRESS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도로명 번호 <span class="field-name">(street_number)</span></div>
                    <div class="detail-field-value">{{T_STREET_NUMBER}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도로명 이름 <span class="field-name">(street_name)</span></div>
                    <div class="detail-field-value">{{T_STREET_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도로명 접미사 <span class="field-name">(street_suffix)</span></div>
                    <div class="detail-field-value">{{T_STREET_SUFFIX}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도시 <span class="field-name">(city)</span></div>
                    <div class="detail-field-value">{{T_CITY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">주 <span class="field-name">(state_or_province)</span></div>
                    <div class="detail-field-value">{{T_STATE_OR_PROVINCE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">우편번호 <span class="field-name">(postal_code)</span></div>
                    <div class="detail-field-value">{{T_POSTAL_CODE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">카운티 <span class="field-name">(county_or_parish)</span></div>
                    <div class="detail-field-value">{{T_COUNTY_OR_PARISH}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">위도 <span class="field-name">(latitude)</span></div>
                    <div class="detail-field-value">{{T_LATITUDE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">경도 <span class="field-name">(longitude)</span></div>
                    <div class="detail-field-value">{{T_LONGITUDE}}</div>
                </div>
            </div>
        </div>

        <!-- 매물 상세 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">매물 상세 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">침실 수 <span class="field-name">(bedrooms_total)</span></div>
                    <div class="detail-field-value">{{T_BEDROOMS_TOTAL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">욕실 수 (전체) <span class="field-name">(bathrooms_total)</span></div>
                    <div class="detail-field-value">{{T_BATHROOMS_TOTAL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">풀 욕실 <span class="field-name">(bathrooms_full)</span></div>
                    <div class="detail-field-value">{{T_BATHROOMS_FULL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">반 욕실 <span class="field-name">(bathrooms_half)</span></div>
                    <div class="detail-field-value">{{T_BATHROOMS_HALF}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">실내 거주면적 <span class="field-name">(living_area)</span></div>
                    <div class="detail-field-value">{{T_LIVING_AREA}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">건물 전체면적 <span class="field-name">(building_area_total)</span></div>
                    <div class="detail-field-value">{{T_BUILDING_AREA_TOTAL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">대지면적 (sqft) <span class="field-name">(lot_size_sqft)</span></div>
                    <div class="detail-field-value">{{T_LOT_SIZE_SQFT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">대지면적 (acres) <span class="field-name">(lot_size_acres)</span></div>
                    <div class="detail-field-value">{{T_LOT_SIZE_ACRES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">대지 특징 <span class="field-name">(lot_features)</span></div>
                    <div class="detail-field-value">{{T_LOT_FEATURES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">건축 연도 <span class="field-name">(year_built)</span></div>
                    <div class="detail-field-value">{{T_YEAR_BUILT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">층수 구분 <span class="field-name">(levels)</span></div>
                    <div class="detail-field-value">{{T_LEVELS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">총 층수 <span class="field-name">(stories_total)</span></div>
                    <div class="detail-field-value">{{T_STORIES_TOTAL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">단지명 <span class="field-name">(subdivision_name)</span></div>
                    <div class="detail-field-value">{{T_SUBDIVISION_NAME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">부동산 상태 <span class="field-name">(property_condition)</span></div>
                    <div class="detail-field-value">{{T_PROPERTY_CONDITION}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">용도 지역 <span class="field-name">(zoning)</span></div>
                    <div class="detail-field-value">{{T_ZONING}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">용도 지역 설명 <span class="field-name">(zoning_description)</span></div>
                    <div class="detail-field-value">{{T_ZONING_DESCRIPTION}}</div>
                </div>
            </div>
        </div>

        <!-- 주차 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">주차 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">지붕 있는 주차 공간 수 <span class="field-name">(covered_spaces)</span></div>
                    <div class="detail-field-value">{{T_COVERED_SPACES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">차고 공간 수 <span class="field-name">(garage_spaces)</span></div>
                    <div class="detail-field-value">{{T_GARAGE_SPACES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">카포트 여부 <span class="field-name">(carport_yn)</span></div>
                    <div class="detail-field-value">{{T_CARPORT_YN}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">오픈 주차 공간 수 <span class="field-name">(open_parking_spaces)</span></div>
                    <div class="detail-field-value">{{T_OPEN_PARKING_SPACES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">총 주차 공간 수 <span class="field-name">(parking_total)</span></div>
                    <div class="detail-field-value">{{T_PARKING_TOTAL}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">주차 특징 <span class="field-name">(parking_features)</span></div>
                    <div class="detail-field-value">{{T_PARKING_FEATURES}}</div>
                </div>
            </div>
        </div>

        <!-- 내부 시설 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">내부 시설 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">가전/주방기기 <span class="field-name">(appliances)</span></div>
                    <div class="detail-field-value">{{T_APPLIANCES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">세탁 시설 <span class="field-name">(laundry_features)</span></div>
                    <div class="detail-field-value">{{T_LAUNDRY_FEATURES}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">내부 특징 <span class="field-name">(interior_features)</span></div>
                    <div class="detail-field-value">{{T_INTERIOR_FEATURES}}</div>
                </div>
            </div>
        </div>

        <!-- 유틸리티 / 도로 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">유틸리티 / 도로 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">수원 <span class="field-name">(water_source)</span></div>
                    <div class="detail-field-value">{{T_WATER_SOURCE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">유틸리티 <span class="field-name">(utilities)</span></div>
                    <div class="detail-field-value">{{T_UTILITIES}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">도로 접면 유형 <span class="field-name">(road_frontage_type)</span></div>
                    <div class="detail-field-value">{{T_ROAD_FRONTAGE_TYPE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">도로 포장 유형 <span class="field-name">(road_surface_type)</span></div>
                    <div class="detail-field-value">{{T_ROAD_SURFACE_TYPE}}</div>
                </div>
            </div>
        </div>

        <!-- 상업용 / 수익용 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">상업용 / 수익용 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">사업 유형 <span class="field-name">(business_type)</span></div>
                    <div class="detail-field-value">{{T_BUSINESS_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">판매 유형 <span class="field-name">(sale_type)</span></div>
                    <div class="detail-field-value">{{T_SALE_TYPE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">총 유닛 수 <span class="field-name">(units_total)</span></div>
                    <div class="detail-field-value">{{T_UNITS_TOTAL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">건물 수 <span class="field-name">(number_of_buildings)</span></div>
                    <div class="detail-field-value">{{T_NUMBER_OF_BUILDINGS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">개발 현황 <span class="field-name">(development_status)</span></div>
                    <div class="detail-field-value">{{T_DEVELOPMENT_STATUS}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">총수입 <span class="field-name">(gross_income)</span></div>
                    <div class="detail-field-value">{{T_GROSS_INCOME}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">순영업이익 <span class="field-name">(net_operating_income)</span></div>
                    <div class="detail-field-value">{{T_NET_OPERATING_INCOME}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">운영 비용 <span class="field-name">(operating_expense)</span></div>
                    <div class="detail-field-value">{{T_OPERATING_EXPENSE}}</div>
                </div>
            </div>
        </div>

        <!-- 매물 설명 -->
        <div class="detail-card">
            <div class="detail-section-label">매물 설명</div>
            <div class="detail-grid">
                <div class="detail-field full">
                    <div class="detail-field-label">공개 설명 <span class="field-name">(public_remarks)</span></div>
                    <div class="detail-field-value" style="white-space: pre-wrap; line-height: 1.6;">{{T_PUBLIC_REMARKS}}</div>
                </div>
                <div class="detail-field full" style="border-bottom:none;">
                    <div class="detail-field-label">내부 메모 <span class="field-name">(private_remarks)</span></div>
                    <div class="detail-field-value" style="white-space: pre-wrap; line-height: 1.6;">{{T_PRIVATE_REMARKS}}</div>
                </div>
            </div>
        </div>

        <!-- 날짜 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">날짜 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">리스팅 계약 시작일 <span class="field-name">(listing_contract_date)</span></div>
                    <div class="detail-field-value">{{T_LISTING_CONTRACT_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">시장 최초 공개일 <span class="field-name">(on_market_date)</span></div>
                    <div class="detail-field-value">{{T_ON_MARKET_DATE}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">거래 완료일 <span class="field-name">(close_date)</span></div>
                    <div class="detail-field-value">{{T_CLOSE_DATE}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">시장 노출 일수 <span class="field-name">(days_on_market)</span></div>
                    <div class="detail-field-value">{{T_DAYS_ON_MARKET}}</div>
                </div>
            </div>
        </div>

        <!-- 학군 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">학군 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">고등학교 학군 <span class="field-name">(high_school_district)</span></div>
                    <div class="detail-field-value">{{T_HIGH_SCHOOL_DISTRICT}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">초등학교 <span class="field-name">(elementary_school)</span></div>
                    <div class="detail-field-value">{{T_ELEMENTARY_SCHOOL}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">중학교 <span class="field-name">(middle_or_junior_school)</span></div>
                    <div class="detail-field-value">{{T_MIDDLE_OR_JUNIOR_SCHOOL}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">고등학교 <span class="field-name">(high_school)</span></div>
                    <div class="detail-field-value">{{T_HIGH_SCHOOL}}</div>
                </div>
            </div>
        </div>

        <!-- 에이전트 / 오피스 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">에이전트 / 오피스 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">리스팅 에이전트 KEY <span class="field-name">(list_agent_key)</span></div>
                    <div class="detail-field-value">{{T_LIST_AGENT_KEY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">바이어 에이전트 KEY <span class="field-name">(buyer_agent_key)</span></div>
                    <div class="detail-field-value">{{T_BUYER_AGENT_KEY}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">리스팅 오피스 KEY <span class="field-name">(list_office_key)</span></div>
                    <div class="detail-field-value">{{T_LIST_OFFICE_KEY}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">바이어 오피스 KEY <span class="field-name">(buyer_office_key)</span></div>
                    <div class="detail-field-value">{{T_BUYER_OFFICE_KEY}}</div>
                </div>
            </div>
        </div>

        <!-- 관리 정보 -->
        <div class="detail-card">
            <div class="detail-section-label">관리 정보</div>
            <div class="detail-grid">
                <div class="detail-field">
                    <div class="detail-field-label">인터넷 전체 매물 공개 <span class="field-name">(internet_entire_listing_display_yn)</span></div>
                    <div class="detail-field-value">{{T_INTERNET_ENTIRE_LISTING_DISPLAY_YN}}</div>
                </div>
                <div class="detail-field">
                    <div class="detail-field-label">인터넷 주소 공개 <span class="field-name">(internet_address_display_yn)</span></div>
                    <div class="detail-field-value">{{T_INTERNET_ADDRESS_DISPLAY_YN}}</div>
                </div>
                <div class="detail-field" style="border-bottom:none;">
                    <div class="detail-field-label">is_active</div>
                    <div class="detail-field-value"><span class="detail-status-badge">{{T_IS_ACTIVE}}</div></div>
                </div>
            </div>
        </div>

        <!-- 이미지 -->
        <div class="detail-card">
            <div class="detail-section-label">매물 이미지</div>
            <div class="detail-grid" style="grid-template-columns: repeat(2, 1fr);">
                <!-- LOOP START 'T_MEDIA_LOOP' -->
                <div class="detail-field" style="border-right: 1px solid #f0f2f7;">
                    <div class="detail-field-label" >
                        <!-- IF '{{T_MEDIA_LOOP.T_IS_PRIMARY}}' == '1' -->
                        대표 이미지
                        <!-- ELSE -->
                        이미지 #{{T_MEDIA_LOOP.T_MEDIA_ORDER}}
                        <!-- END IF -->
                    </div>
                    <div class="detail-field-value bimg" style="margin-top:8px;cursor: pointer;width:auto;" onclick="openImageModal(this, '이미지 #{{T_MEDIA_LOOP.T_MEDIA_ORDER}}');">{{T_MEDIA_LOOP.T_MEDIA_URL}}</div>
                </div>
                <!-- LOOP END 'T_MEDIA_LOOP' -->
            </div>
        </div>

    </div>
    
    <div class="d-flex gap-2 justify-content-between mt-2">
    <div><a href="realstate_list.php"
            class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">목록</a>
    </div>
    <div class="d-flex gap-2">
        <!--button type="button"
                class="delete-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                onclick="GO_UPDATE('{{T_REALESTATE_LISTING_ID}}');"><i class="bx bx-save text-4 me-2"></i> 수정
        </button-->
<!-- IF START 'T_UPDELETE' -->        
        <button type="button"
                class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1"
                onclick="GO_DELETE('{{T_REALESTATE_LISTING_ID}}');"><i class="bx bx-trash text-4 me-2"></i> 삭제
        </button>
<!-- IF END 'T_UPDELETE' -->        
    </div>
</div>
</div>



<!-- 이미지 모달 -->
<div id="imageModal" class="image-modal" onclick="closeImageModal(event);">
    <div class="image-modal-content" onclick="event.stopPropagation();">
        <span class="image-modal-close" onclick="closeImageModal();">&times;</span>
        <div class="image-modal-title" id="imageModalTitle"></div>
        <img id="imageModalImage" class="image-modal-image" src="" alt="이미지">
    </div>
</div>

<script src="../vendor/jquery/jquery.js"></script>
<script src="../js/realstate/realstate_view.js"></script>
<script src="../js/youtube/iibiz_common.js"></script>
        <script src="/js/js.cookie.min.js"></script>
        <script src="/js/multi_select.js" ></script>
        <script src="/js/libs/jquery.mask.js"></script>
<!-- INCLUDE FILE '../include/footer.php' -->
