<?php
/**
 * permission_common.php
 * - 권한 그룹/체크박스 목록 정의
 * - 등록(write) / 수정(edit) 화면에서 공통으로 사용하는 렌더링 함수
 *
 * 사용법:
 *   include_once('permission_common.php');
 *   render_permission_checkboxes($permission_list); // 등록화면 (아무것도 체크 안됨)
 *   render_permission_checkboxes($permission_list, $checked_list); // 수정화면 (기존값 체크)
 */

// 그룹명 => [ 권한코드 => 화면표시명 ]
$permission_list = [
    '사용자' => [
        'user_manage'     => '사용자 관리',
        'user_access_log' => '사용자 접속 내역',
    ],
    '배너광고' => [
        'banner_ad_payment'     => '배너 광고 관리'
    ],
    '뉴스' => [
        'news_manage' => '뉴스 게시물 관리',
    ],
    '유튜브' => [
        'youtube_madangn_manage' => 'MadangN 동영상 관리',
        'youtube_all_manage'     => 'Youtube 전체 동영상 관리',
    ],
    '커뮤니티' => [
        'ad_company_manage'       => '광고회사 관리',
        'job_manage'               => '구인구직 관리',
        'job_ad_payment'           => '구인구직 광고 신청 & 결제 조회',
        'buysell_manage'           => '사고팔고 관리',
        'business_manage'          => '비지니스 관리',
        'business_ad_payment'      => '비지니스 광고 신청 & 결제 조회',
        'autodealer_manage'        => '자동차 딜러 관리',
        'autodealer_ad_payment'    => '자동차 딜러 광고 신청 & 결제 조회',
        'autolisting_manage'       => '자동차 매물 관리',
    ],
    '타운정보' => [
        'marketsale_market_manage' => '마켓세일 마켓 관리',
        'marketsale_branch_manage' => '마켓세일 지점 관리',
        'marketsale_flyer_manage'  => '마켓세일 전단지 관리',
        'marketsale_user_manage'   => '마켓세일 사용자 관리',
        'findperson_manage'        => '사람찾기 관리',
        'eventnoti_manage'         => '행사알림 관리',
        'madangn_event_manage'     => '마당엔 이벤트 관리',
    ],
    '부동산' => [
        'agent_manage'              => '에이전트 관리',
        'agent_ad_payment'          => '에이전트 신청 & 결제 조회',
        'realestate_listing_manage' => '부동산 매물관리',
    ],
    'Setting' => [
        'permission_setting' => '권한설정',
    ],
];

/**
 * 부트스트랩 카드형 체크박스 그룹 렌더링
 *
 * @param array $permission_list 그룹명 => [코드 => 라벨]
 * @param array $checked_list    이미 체크되어야 할 코드 배열 (수정화면용, 등록화면은 빈 배열)
 */
function render_permission_checkboxes($permission_list, $checked_list = [])
{
    $html = "";
    
    $html = '<div class="row mt-3">';
    foreach ($permission_list as $group_name => $items) {
        $html .= '<div class="col-md-4 mb-3">';
        $html .= '  <div class="card h-100">';
        $html .= '    <div class="card-header fw-bold">' . htmlspecialchars($group_name) . '</div>';
        $html .= '    <div class="card-body">';
        foreach ($items as $code => $label) {
            $id      = 'perm_' . $code;
            $checked = in_array($code, $checked_list, true) ? 'checked' : '';
            $html .= '      <div class="form-check">';
            $html .= '        <input class="form-check-input" type="checkbox" name="permission[]" value="' . htmlspecialchars($code) . '" id="' . htmlspecialchars($id) . '" ' . $checked . '>';
            $html .= '        <label class="form-check-label" for="' . htmlspecialchars($id) . '">' . htmlspecialchars($label) . '</label>';
            $html .= '      </div>';
        }
        $html .= '    </div>';
        $html .= '  </div>';
        $html .= '</div>';
    }
    $html .= '</div>';
    
    return $html;
}
