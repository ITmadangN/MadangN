<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 미리보기</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .upload-container {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.1);
            width: 600px;
            max-width: 90vw;
        }

        h1 {
            font-size: 24px;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 24px;
        }

        .drop-zone {
            border: 2px dashed #c0c6d0;
            border-radius: 12px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fafbfc;
        }

        .drop-zone:hover {
            border-color: #4a6cf7;
            background: #f0f3ff;
        }

        .drop-zone.dragover {
            border-color: #4a6cf7;
            background: #e8edff;
        }

        .drop-zone-icon { font-size: 48px; margin-bottom: 12px; }

        .drop-zone-text { color: #555; font-size: 16px; }
        .drop-zone-text span {
            color: #4a6cf7;
            font-weight: 600;
            text-decoration: underline;
        }

        #fileInput { display: none; }

        .thumbnail-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
            margin-top: 24px;
        }

        .thumbnail-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            aspect-ratio: 1;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .thumbnail-item .remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0,0,0,0.6);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .thumbnail-item .remove-btn:hover { background: #e74c3c; }

        .thumbnail-item .file-name {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.55);
            color: #fff;
            font-size: 11px;
            padding: 4px 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-preview { background: #4a6cf7; color: #fff; }
        .btn-preview:hover { background: #3a5ae0; }
        .btn-preview:disabled { background: #b0bec5; cursor: not-allowed; }

        .btn-clear { background: #f0f0f0; color: #555; }
        .btn-clear:hover { background: #e0e0e0; }

        .file-count {
            margin-top: 16px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }

        .file-count strong { color: #4a6cf7; }
    </style>
</head>
<body>

<div class="upload-container">
    <h1>📷 이미지 미리보기</h1>
    <p class="subtitle">최대 7개의 이미지를 선택하고 새 탭에서 미리보기를 확인하세요.</p>

    <div class="drop-zone" id="dropZone">
        <div class="drop-zone-icon">🖼️</div>
        <p class="drop-zone-text">
            이미지를 드래그하거나 <span>클릭하여 선택</span>하세요
        </p>
    </div>
    <input type="file" id="fileInput" accept="image/*" multiple>

    <div class="thumbnail-list" id="thumbnailList"></div>
    <p class="file-count" id="fileCount"></p>

    <div class="actions">
        <button class="btn btn-clear" onclick="clearAll()">전체 삭제</button>
        <button class="btn btn-preview" id="previewBtn" onclick="openPreview()" disabled>
            새 탭에서 미리보기
        </button>
    </div>
</div>

<script>
    const MAX_FILES = 7;
    const dropZone  = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const thumbnailList = document.getElementById('thumbnailList');
    const fileCount = document.getElementById('fileCount');
    const previewBtn = document.getElementById('previewBtn');

    let imageDataList = [];

    // ── 드래그 & 클릭 ──
    dropZone.addEventListener('click', () => fileInput.click());
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('dragover'));
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        handleFiles(e.dataTransfer.files);
    });
    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
        fileInput.value = '';
    });

    function handleFiles(files) {
        for (const file of Array.from(files)) {
            if (!file.type.startsWith('image/')) {
                alert(`"${file.name}"은(는) 이미지 파일이 아닙니다.`);
                continue;
            }
            if (imageDataList.length >= MAX_FILES) {
                alert(`최대 ${MAX_FILES}개까지 선택 가능합니다.`);
                break;
            }
            const reader = new FileReader();
            reader.onload = (e) => {
                imageDataList.push({ name: file.name, dataURL: e.target.result });
                renderThumbnails();
            };
            reader.readAsDataURL(file);
        }
    }

    function renderThumbnails() {
        thumbnailList.innerHTML = '';
        imageDataList.forEach((img, index) => {
            const item = document.createElement('div');
            item.className = 'thumbnail-item';
            item.innerHTML = `
                <img src="${img.dataURL}" alt="${img.name}">
                <button class="remove-btn" onclick="removeImage(${index})">&times;</button>
                <div class="file-name">${img.name}</div>
            `;
            thumbnailList.appendChild(item);
        });
        fileCount.innerHTML = imageDataList.length > 0
            ? `<strong>${imageDataList.length}</strong> / ${MAX_FILES} 개 선택됨` : '';
        previewBtn.disabled = imageDataList.length === 0;
    }

    function removeImage(index) {
        imageDataList.splice(index, 1);
        renderThumbnails();
    }

    function clearAll() {
        imageDataList = [];
        renderThumbnails();
    }

    // ══════════════════════════════════════════
    //  ★ Blob URL + <a _blank> 클릭으로 새 탭 열기
    // ══════════════════════════════════════════
    function openPreview() {
        if (imageDataList.length === 0) return;

        // 1) 미리보기 HTML 문자열 생성
        const html = buildPreviewHTML();

        // 2) Blob → Object URL 생성
        const blob = new Blob([html], { type: 'text/html' });
        const url  = URL.createObjectURL(blob);

        // 3) <a target="_blank"> 를 프로그래밍 방식으로 클릭
        const a = document.createElement('a');
        a.href   = url;
        a.target = '_blank';
        a.rel    = 'noopener';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        // 4) 메모리 해제 (약간의 딜레이 후)
        setTimeout(() => URL.revokeObjectURL(url), 5000);
    }

    function buildPreviewHTML() {
        return `<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이미지 미리보기</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #1a1a2e;
            color: #fff;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            background: #16213e;
            border-bottom: 1px solid #0f3460;
        }
        header h1 { font-size: 20px; }
        header .count {
            background: #4a6cf7;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 14px;
        }
        .img-name {
            text-align: center;
            padding: 8px;
            font-size: 13px;
            color: #aaa;
        }
        .viewer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 190px);
            padding: 20px;
            position: relative;
        }
        .viewer img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.5);
            transition: opacity 0.3s;
        }
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.15);
            border: none;
            color: #fff;
            font-size: 32px;
            padding: 12px 16px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.2s;
            user-select: none;
        }
        .nav-btn:hover { background: rgba(255,255,255,0.3); }
        .nav-btn.prev { left: 16px; }
        .nav-btn.next { right: 16px; }
        .strip {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            background: #16213e;
            overflow-x: auto;
        }
        .strip img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 3px solid transparent;
            opacity: 0.5;
            transition: all 0.2s;
        }
        .strip img.active {
            border-color: #4a6cf7;
            opacity: 1;
        }
        .strip img:hover { opacity: 0.85; }
    </style>
</head>
<body>

<header>
    <h1>📷 이미지 미리보기</h1>
    <span class="count">${imageDataList.length}개 이미지</span>
</header>

<p class="img-name" id="imgName"></p>

<div class="viewer">
    <button class="nav-btn prev" onclick="navigate(-1)">&#8249;</button>
    <img id="mainImage" src="" alt="미리보기">
    <button class="nav-btn next" onclick="navigate(1)">&#8250;</button>
</div>

<div class="strip" id="strip"></div>

<script>
    const images = ${JSON.stringify(imageDataList)};
    let currentIndex = 0;

    const mainImage = document.getElementById('mainImage');
    const imgName   = document.getElementById('imgName');
    const strip     = document.getElementById('strip');

    images.forEach((img, i) => {
        const thumb = document.createElement('img');
        thumb.src = img.dataURL;
        thumb.alt = img.name;
        thumb.onclick = () => showImage(i);
        strip.appendChild(thumb);
    });

    function showImage(index) {
        currentIndex = index;
        mainImage.src = images[index].dataURL;
        imgName.textContent = images[index].name + '  (' + (index+1) + ' / ' + images.length + ')';
        document.querySelectorAll('.strip img').forEach((el, i) => {
            el.classList.toggle('active', i === index);
        });
    }

    function navigate(dir) {
        let next = currentIndex + dir;
        if (next < 0) next = images.length - 1;
        if (next >= images.length) next = 0;
        showImage(next);
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft')  navigate(-1);
        if (e.key === 'ArrowRight') navigate(1);
    });

    showImage(0);
<\/script>
</body>
</html>`;
    }
</script>

</body>
</html>
