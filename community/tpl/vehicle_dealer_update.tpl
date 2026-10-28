<!-- INCLUDE FILE '../include/header.php' -->

<style>
#drop-zone.dragover {
    background: #eef6ff !important;
    border-color: #0d6efd !important;
}

.preview-item { 
    position: relative; 
    overflow: hidden; 
    border-radius: 8px; 
}


.preview-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    display: block;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
}
.preview-item .btn-remove {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 24px;
    height: 24px;
    line-height: 22px;
    text-align: center;
    border-radius: 50%;
    background: rgba(0,0,0,.6);
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
    padding: 0;
}
.preview-item .btn-remove:hover { background: rgba(220,53,69,.9); }
.preview-item .file-size {
    position: absolute;
    bottom: 0; left: 0; right: 0;
    background: rgba(0,0,0,.5);
    color: #fff;
    font-size: 11px;
    padding: 2px 4px;
    text-align: center;
}

#preview-area,
#exist-preview-area {
    display: grid;
    grid-template-columns: repeat(5, 1fr); /* PC: 5개 */
    gap: 8px;
}
@media (max-width: 992px) {
    #preview-area,
    #exist-preview-area { grid-template-columns: repeat(4, 1fr); } /* 태블릿: 4개 */
}
@media (max-width: 576px) {
    #preview-area,
    #exist-preview-area { grid-template-columns: repeat(3, 1fr); } /* 모바일: 3개 */
}


preview-item { position: relative; overflow: hidden; border-radius: 8px; }
.preview-item img {
    width: 100%; height: 120px; object-fit: cover; display: block;
    border: 1px solid #e5e5e5; border-radius: 8px;
}
.preview-item.deleted img { opacity: .35; filter: grayscale(1); }
.preview-item .btn-remove {
    position: absolute; top: 4px; right: 4px;
    width: 24px; height: 24px; line-height: 22px; text-align: center;
    border-radius: 50%; background: rgba(0,0,0,.6); color: #fff;
    border: none; cursor: pointer; font-size: 14px; padding: 0;
}

</style>
<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10" />딜러 자동차 수정하기</h3>
                        </div>
                    </div>

                    <div class="border p-2 sm:p-4 bg-gray-25 rounded">
                        * 주행 거리, 사고 유무, 정비 이력 등 차량의 상태를 정확하게 작성해 주세요.<br />
                        * 투명한 정보 공유는 빠르고 기분 좋은 거래의 시작이 됩니다.<br />
                        * 다양한 사진을 통해 차량의 상태를 고객에게 전달해주세요
                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_vehicle_dealer.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="vehicle_dealer_update">
                        <input type="hidden" name="dealer_id" id="dealer_id" value="{{T_DEALER_ID}}">
                        <input type="hidden" name="id" value="{{T_ID}}">
                        <div class="comborder mt-n1">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-0 sm:pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">기본 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-user-circle-o fs-5"></i>
                                                <span>회사명</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="company_name" id="company_name" value="{{COMPANY_NAME}}" placeholder="회사명" style="padding-left: 100px !important;" readonly>
                                        </div>
                                    </div>    
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-user-circle-o fs-5"></i>
                                                <span>딜러명</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="seller_name" id="seller_name" readonly value="{{T_SELLER_NAME}}" placeholder="딜러명" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-envelope fs-5"></i>
                                                <span>이메일<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="email" name="seller_email" id="seller_email" readonly value="{{T_SELLER_EMAIL}}" placeholder="이메일" required style="padding-left: 100px !important;">
                                        </div>
                                    </div>    
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-phone fs-5"></i>
                                                <span>연락처</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="seller_phone" id="seller_phone" readonly value="{{T_SELLER_PHONE}}" placeholder="연락처" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    
                                    
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-globe fs-5"></i>
                                                <span>거래지역</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code" onchange="GET_SELECT_CITY_NAME('all');" style="padding-left: 100px !important;">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-map-marker fs-5"></i>
                                                <span>도시전체</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="city_name" id="city_name" style="padding-left: 100px !important;">
                                                {{S_SELECT_CITY_NAME}}
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">차량 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-wrench fs-5"></i>
                                                <span>제조사<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" id="car_maker" required name="car_maker" value="{{T_CAR_MODEL}}" style="padding-left: 100px !important;">
                                                {{S_SELECT_CAR_MAKER}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-car fs-5"></i>
                                                <span>모델<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="car_model" id="car_model" value="{{T_CAR_MODEL}}" placeholder="자동차 모델" required style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-calendar fs-5"></i>
                                                <span>연식<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="car_year" id="car_year" required style="padding-left: 100px !important;">
                                                {{S_SELECT_CAR_YEAR}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-tachometer fs-5"></i>
                                                <span>주행거리<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="car_mileage" id="car_mileage" value="{{T_CAR_MILEAGE}}"  placeholder="mileage" required style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-paint-brush fs-5"></i>
                                                <span>색상<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="car_color" id="car_color" required style="padding-left: 100px !important;">
                                                {{S_SELECT_CAR_COLOR}}
                                            </select>                                            
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-money fs-5"></i>
                                                <span>판매가격<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="listing_price" id="listing_price" value="{{T_LISTING_PRICE}}" placeholder="$판매가격" required style="padding-left: 100px !important;">
                                        </div>
                                    </div>
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa fa-gears fs-5"></i>
                                                <span>사고유무<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="car_accident_history" id="car_accident_history" required style="padding-left: 100px !important;">
                                                {{S_SELECT_CAR_ACCIDENT_HISTORY}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">옵션 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-battery fs-5"></i>
                                                <span>연료종류</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="fuel_type" id="fuel_type" style="padding-left: 100px !important;">
                                                {{S_SELECT_FUEL_TYPE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-bus fs-5"></i>
                                                <span>차체타입</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="body_type" id="body_type" style="padding-left: 100px !important;">
                                                {{S_SELECT_BODY_TYPE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-cog fs-5"></i>
                                                <span>변속기</span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="transmission" id="transmission" style="padding-left: 100px !important;">
                                                {{S_SELECT_TRANSMISSION}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control h-100px w-full fs-6 bg-white" type="text" placeholder="기타옵션" name="options_description" id="options_description"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">추가설명 및 사진</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">
                                    <div class="col-12">
                                        <textarea class="form-control h-250px w-full fs-6 bg-white" type="text" placeholder="자동차 설명" name="description" id="description">{{T_DESCRIPTION}}</textarea>
                                        <input type="hidden" name="h_del_img" id="h_del_img" value="">
                                        <input type="hidden" name="h_exist_image" id="h_exist_image" value="{{T_EXIST_IMAGE}}">
                                        <div id="file-wrapper" class="mt-1">

                                        <!-- 기존에 등록된 이미지 미리보기 -->
                                        <div id="exist-preview-area" class="mt-1"></div>

                                        <!-- 드래그 앤 드롭 영역 (새 이미지 추가) -->
                                        <div id="drop-zone" class="border border-2 border-dashed rounded text-center mt-2"
                                             style="min-height:140px; cursor:pointer; background:#fafafa; transition:.2s;
                                                    display:flex; flex-direction:column; align-items:center; justify-content:center; gap:6px; padding:16px;">
                                            <div><i class="fa fa-cloud-upload fs-1 text-gray-500"></i></div>
                                            <div class="fs-6 fw-bold">새 이미지를 여기로 드래그하거나 클릭하여 선택하세요</div>
                                            <div class="text-gray-500 fs-7">
                                                jpg, png, gif만 가능 / 2MB 이하 / 최대 <span id="max-count">20</span>개
                                            </div>
                                            <div class="text-gray-700 fs-7">
                                                현재 <span id="current-count">0</span> / 20 개 (기존 포함 <span id="total-count">0</span>개)
                                            </div>
                                        </div>

                                        <!-- 새 이미지용 파일 input (숨김) -->
                                        <input type="file" id="image-inputr" name="user_files[]" accept="image/jpeg,image/png,image/gif" multiple class="d-none">

                                        <!-- 새로 추가한 이미지 미리보기 -->
                                        <div id="preview-area" class="mt-1"></div>
                                    </div>

                                        <button class="btn btn-primary btn-sm mt-1 fs-5" type="submit" style="width:100% !important;"><i class="fa fa-check"></i> 수정하기</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section end -->
<script>
(function () {
    const MAX_FILES   = 20;
    const MAX_SIZE    = 2 * 1024 * 1024;
    const ALLOW_TYPES = ['image/jpeg', 'image/png', 'image/gif'];
    const IMG_BASE    = '/secret/img_protect.php?c=community&cc=vehicle&s={{T_ID}}&d=img';   // ← 기존 이미지가 저장된 실제 경로로 수정

    const dropZone    = document.getElementById('drop-zone');
    const fileInput   = document.getElementById('image-inputr');
    const previewArea = document.getElementById('preview-area');
    const existArea   = document.getElementById('exist-preview-area');
    const currentCnt  = document.getElementById('current-count');
    const totalCnt    = document.getElementById('total-count');
    const hDelImg     = document.getElementById('h_del_img');
    const hExistImg   = document.getElementById('h_exist_image');

    let fileStore  = [];   // 새로 추가하는 파일
    let existImages = [];  // 기존 이미지 [{name:'xxx.jpg', deleted:false}, ...]
    let delImages   = [];  // 삭제할 기존 이미지 파일명

    // ===== 기존 이미지 파싱 (형식에 맞게 조정) =====
    function parseExistImages() {        
        const raw = (hExistImg.value || '').trim();
        if (!raw) return [];        
                
        return raw.split(',').map(s => s.trim()).filter(Boolean);
        
        
    }

    existImages = parseExistImages().map(name => ({ name: name, deleted: false }));    
    console.log(existImages);

    // ===== 기존 이미지 렌더링 =====
    function renderExist() {
        existArea.innerHTML = '';
        existImages.forEach((img, index) => {
            const item = document.createElement('div');
            item.className = 'preview-item' + (img.deleted ? ' deleted' : '');

            const image = document.createElement('img');
            image.src = (img.name.indexOf('http') === 0) ? img.name : (IMG_BASE + img.name);

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn-remove';
            removeBtn.innerHTML = img.deleted ? '&#8635;' : '&times;'; // 삭제표시면 복구버튼
            removeBtn.addEventListener('click', () => toggleExist(index));

            item.appendChild(image);
            item.appendChild(removeBtn);
            existArea.appendChild(item);
        });
    }

    // 기존 이미지 삭제/복구 토글
    function toggleExist(index) {
        existImages[index].deleted = !existImages[index].deleted;
        // 삭제 목록 갱신
        delImages = existImages.filter(i => i.deleted).map(i => i.name);
        hDelImg.value = delImages.join(',');   // 서버에 콤마구분으로 전달
        renderExist();
        updateCount();
    }

    // ===== 드래그 / 클릭 (새 이미지) =====
    dropZone.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', (e) => { addFiles(e.target.files); fileInput.value = ''; });

    ['dragenter','dragover'].forEach(evt => dropZone.addEventListener(evt, (e) => {
        e.preventDefault(); e.stopPropagation(); dropZone.classList.add('dragover');
    }));
    ['dragleave','drop'].forEach(evt => dropZone.addEventListener(evt, (e) => {
        e.preventDefault(); e.stopPropagation(); dropZone.classList.remove('dragover');
    }));
    dropZone.addEventListener('drop', (e) => addFiles(e.dataTransfer.files));

    function existAliveCount() {
        return existImages.filter(i => !i.deleted).length;
    }

    function addFiles(fileList) {
        const files = Array.from(fileList);
        for (const file of files) {
            if (existAliveCount() + fileStore.length >= MAX_FILES) {
                alert('이미지는 기존 포함 최대 ' + MAX_FILES + '개까지 가능합니다.');
                break;
            }
            if (!ALLOW_TYPES.includes(file.type)) { alert('"' + file.name + '" : jpg, png, gif만 가능합니다.'); continue; }
            if (file.size > MAX_SIZE) { alert('"' + file.name + '" : 2MB 이하만 가능합니다.'); continue; }
            const dup = fileStore.some(f => f.name === file.name && f.size === file.size);
            if (dup) continue;
            fileStore.push(file);
        }
        renderPreview();
        syncInput();
    }

    function renderPreview() {
        previewArea.innerHTML = '';
        fileStore.forEach((file, index) => {
            const item = document.createElement('div');
            item.className = 'preview-item';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.onload = () => URL.revokeObjectURL(img.src);

            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn-remove';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', () => removeFile(index));

            const sizeTag = document.createElement('div');
            sizeTag.className = 'file-size';
            sizeTag.textContent = (file.size / 1024).toFixed(0) + ' KB';

            item.appendChild(img);
            item.appendChild(removeBtn);
            item.appendChild(sizeTag);
            previewArea.appendChild(item);
        });
        updateCount();
    }

    function removeFile(index) {
        fileStore.splice(index, 1);
        renderPreview();
        syncInput();
    }

    function updateCount() {
        currentCnt.textContent = fileStore.length;
        totalCnt.textContent = existAliveCount() + fileStore.length;
    }

    function syncInput() {
        const dt = new DataTransfer();
        fileStore.forEach(f => dt.items.add(f));
        fileInput.files = dt.files;        
        fileInput.setAttribute('name', 'user_files[]');
    }

    // 외부(ajaxForm beforeSubmit)에서 쓸 함수 노출
    window.syncUploadInput = function () { 
        syncInput(); 
    };
    
    window.getTotalImageCount = function () { return existAliveCount() + fileStore.length; };

    // 초기 렌더링
    renderExist();
    renderPreview();
})();
</script>

<script>
    var g_did = '{{T_DEALER_ID}}';
</script>

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/vehicle_dealer_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>
<script defer src="/js/js.cookie.min.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
