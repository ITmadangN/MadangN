let file_select = 'N';

// 1. 커스텀 레이블 클릭 시 실제 input file 트리거
function triggerInput(label) {
    const input = label.parentElement.querySelector('input[type="file"]');
    input.click();
}

// 2. 파일 선택 시 이미지 미리보기 생성 및 텍스트 변경
function updateIndividualFile(input) {
    const group = input.closest('.custom-file-view');
    const fileNameDisplay = group.querySelector('.file-name-text');
    const deleteBtn = group.querySelector('.btn-close-custom');

    // 기존에 생성된 미리보기 이미지가 있는지 확인
    let previewImg = group.querySelector('.file-preview-img');

    if (input.files && input.files[0]) {
        const file = input.files[0];
        const maxSize = 6 * 1024 * 1024; // 6MB

        // 이미지 파일 확장자 체크 (선택 사항)
        if (!file.type.match('image.*')) {
            alert('이미지 파일(jpg, png, gif)만 선택 가능합니다.');
            input.value = '';
            return;
        }

        // 파일 사이즈 체크 (1MB 초과 시)
        if (file.size > maxSize) {
            alert(`파일 크기가 너무 큽니다.\n현재 크기: ${(file.size / 1024 / 1024).toFixed(2)}MB\n최대 허용 크기: 6MB`);
            input.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            // 미리보기 이미지 태그가 없으면 새로 생성
            if (!previewImg) {
                previewImg = document.createElement('img');
                previewImg.className = 'file-preview-img me-2';
                // 스타일 설정 (원하는 크기로 조절 가능)
                previewImg.style.width = '28px';
                previewImg.style.height = '28px';
                previewImg.style.objectFit = 'cover';
                previewImg.style.borderRadius = '0';
                previewImg.style.border = '1px solid #ddd';

                // 파일 이름 텍스트 앞에 이미지 삽입
                fileNameDisplay.before(previewImg);
            }

            // 이미지 경로 설정 및 노출
            previewImg.src = e.target.result;
            previewImg.style.display = "inline-block";

            // 텍스트 변경 및 삭제 버튼 노출
            fileNameDisplay.innerText = file.name;
            fileNameDisplay.style.color = "#333";
            deleteBtn.style.display = "flex";
        };
        reader.readAsDataURL(file);
        
        file_select = 'Y';
    }
}

function removeInputGroup2(button,del_yn, h_del, type, del_id) {
    const group = button.closest('.file-group');
    const allGroups = document.querySelectorAll('.file-group');

    let del_txt = type + "_" + del_id;
    
    let temp_del = document.getElementById(h_del).value;
    
    temp_del = temp_del + "," + del_txt;
    
    document.getElementById(h_del).value = temp_del;

    if(del_yn == 'Y') {
    
        if (allGroups.length > 1) {
            // 줄이 여러 개면 해당 줄 삭제
            group.remove();
        } 
    }

    // 업로드가 하나만 남았으면 
    if (allGroups.length < 2) file_select = 'N';
    else file_select = 'Y';
    
    const input = group.querySelector('input');
    const text = group.querySelector('.file-name-text');
    const previewImg = group.querySelector('.file-preview-img');

    input.value = "";
    text.innerHTML = `이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 이미지는 jpg, png, gif만 가능하며 1MB이하 사이즈만 가능합니다.</span>`;
    text.style.color = "#333";
    button.style.display = "none";

    // 미리보기 이미지 제거
    if (previewImg) {
        previewImg.remove();
    }
    
}

// 3. 해당 인풋 줄 삭제 또는 초기화
function removeInputGroup(button,del_id = '') {
    const group = button.closest('.file-group');
    const allGroups = document.querySelectorAll('.file-group');

    if(del_id !== '') document.getElementById(del_id).value = "Y";

    /*
    if (allGroups.length > 1) {
        // 줄이 여러 개면 해당 줄 삭제
        group.remove();
    } else {
    */
    
    // 업로드가 하나만 남았으면 
    if (allGroups.length < 2) file_select = 'N';
    else file_select = 'Y';

        // 줄이 하나면 삭제하지 않고 내용만 초기화
        const input = group.querySelector('input');
        const text = group.querySelector('.file-name-text');
        const previewImg = group.querySelector('.file-preview-img');

        input.value = "";
        text.innerHTML = `이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 이미지는 jpg, png, gif만 가능하며 1MB이하 사이즈만 가능합니다.</span>`;
        text.style.color = "#333";
        button.style.display = "none";

        // 미리보기 이미지 제거
        if (previewImg) {
            previewImg.remove();
        }
    /*}*/
}

var imgCount = 0;

// 4. 새로운 파일 인풋 줄 추가
function addNewInput(max) {

    if(imgCount >= max) return;
    imgCount++;

    const container = document.getElementById('file-inputs');
    const newGroup = document.createElement('div');
    newGroup.className = 'file-group mb-2'; // 추가되는 줄 간격 조절
    newGroup.innerHTML = `
        <div class="form-control form-control-sm h-40px d-flex align-items-center justify-content-between px-3 custom-file-view pt-1">
            <label class="flex-grow-1 m-0 d-flex align-items-center cursor-pointer text-nowrap overflow-hidden" onclick="triggerInput(this)">
                <span class="file-name-text">이미지를 선택해주세요 <span class="hidden-768">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 이미지는 jpg, png, gif만 가능하며 2MB이하 사이즈만 가능합니다.</span></span>
            </label>
            <button type="button" class="btn-close-custom" style="display: none;" onclick="removeInputGroup(this)"></button>
            <input type="file" name="user_files[]" class="d-none"  accept=".jpg, .jpeg, .png, .gif"  onchange="updateIndividualFile(this)">            
        </div>
    `;
    container.appendChild(newGroup);
}


// 슬라이더 생성 함수
function createSlider(targetId, displayId, minInputId, maxInputId, minVal, maxVal, unit, isPrefix) {
    var slider = document.getElementById(targetId);
    var display = document.getElementById(displayId);

    if(!slider) return; // 엘리먼트가 없으면 중단

    noUiSlider.create(slider, {
        start: [minVal, maxVal],
        connect: true,
        range: { 'min': minVal, 'max': maxVal },
        step: 1
    });

    slider.noUiSlider.on('update', function (values, handle) {
        var v0 = Math.round(values[0]);
        var v1 = Math.round(values[1]);

        // 단위 위치 처리 (앞에 붙일지 뒤에 붙일지)
        if(isPrefix) {
            display.innerHTML = unit + v0.toLocaleString() + " - " + unit + v1.toLocaleString();
        } else {
            display.innerHTML = v0.toLocaleString() + unit + " - " + v1.toLocaleString() + unit;
        }

        document.getElementById(minInputId).value = v0;
        document.getElementById(maxInputId).value = v1;
    });
}

// 각각의 ID로 두 번 호출 (이 부분이 핵심입니다!)
// 1. 가격 슬라이더 ($ 단위)
createSlider('slider-price', 'price-display', 'min_price', 'max_price', 0, 60000, '$', true);

// 2. 거리 슬라이더 (mile 단위)
createSlider('slider-dist', 'dist-display', 'min_dist', 'max_dist', 0, 150000, 'mile', false);

// 3. 대형 가격 슬라이더 ($ 단위, 최대 2,000,000)
createSlider('slider-price-large', 'price-display-large', 'min_price_large', 'max_price_large', 0,900000000, '$', true);
createSlider('rent_slider-price-large', 'price-display-large', 'min_price_large', 'max_price_large', 0,80000000, '$', true);


const cityBtn = document.getElementById('cityBtn');
const cityMenu = document.getElementById('cityMenu');
const cityLabel = document.getElementById('cityLabel');



// 1. 클릭 시 메뉴 토글
cityBtn.addEventListener('click', (e) => {
    cityMenu.classList.toggle('show');
    e.stopPropagation(); // 부모로 클릭 이벤트 전파 방지
});

// 2. 메뉴 안쪽 클릭해도 안닫히게 설정
cityMenu.addEventListener('click', (e) => {
    e.stopPropagation();
});

// 3. 외부 클릭 시 메뉴 닫기
window.addEventListener('click', () => {
    cityMenu.classList.remove('show');
});

function cityNameDisplayCouunt() {
    
    const checkboxes = cityMenu.querySelectorAll('input[type="checkbox"]');
    
        // 4. 체크박스 선택 시 텍스트 변경
    checkboxes.forEach(box => {
        
            
        const checked = Array.from(checkboxes).filter(i => i.checked);
        
        if (checked.length === 0) {
            cityLabel.innerText = "도시 전체";
        } else {
            //cityLabel.innerText = checked[0].parentElement.innerText.trim() + " 외 " + (checked.length - 1);
            cityLabel.innerText = "도시 선택 "+(checked.length)+"개";
        }
    
    });
    
}

function cityNameDisplay() {
                                                  
    cityLabel.innerText = "도시 전체";
        
    const checkboxes = cityMenu.querySelectorAll('input[type="checkbox"]');
        
    // 4. 체크박스 선택 시 텍스트 변경
    checkboxes.forEach(box => {
        box.addEventListener('change', () => {
            
            const checked = Array.from(checkboxes).filter(i => i.checked);
            
            if (checked.length === 0) {
                cityLabel.innerText = "도시 전체";
            } else if (checked.length === 1) {
                //cityLabel.innerText = checked[0].parentElement.innerText.trim();
                cityLabel.innerText = "도시 선택 1개";
            } else {
                //cityLabel.innerText = checked[0].parentElement.innerText.trim() + " 외 " + (checked.length - 1);
                cityLabel.innerText = "도시 선택 "+(checked.length)+"개";
            }
        });
    });

}

function changeFontSize(step) {
    const content = document.getElementById('content_view');
    // 현재 설정된 폰트 사이즈 가져오기 (기본값 16px)
    let currentSize = parseFloat(window.getComputedStyle(content).fontSize);

    // 새로운 사이즈 계산
    let newSize = currentSize + (step * 2);

    // 최소/최대 제한 (선택 사항)
    if (newSize >= 12 && newSize <= 30) {
        content.style.fontSize = newSize + 'px';
    }
}

