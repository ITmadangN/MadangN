var banner_data;

document.addEventListener("DOMContentLoaded", function() {

    const adData = {

        "banner_home": {
            image: "/ad/images/main_banner.jpg",
            baseWidth: 800,
            baseHeight: 1957,

            banners: [
                { id: "왼쪽_세로배너-1", name: "왼쪽_세로배너-1", top: 69, left: 4, width: 78, height: 300, image_w:160, image_h:600 },
                { id: "왼쪽_세로배너-2", name: "왼쪽_세로배너-2", top: 389, left: 4, width: 78, height: 112, image_w:160, image_h:222 },
                { id: "왼쪽_세로배너-3", name: "왼쪽_세로배너-3", top: 504, left: 4, width: 78, height: 230, image_w:160, image_h:450 },
                { id: "왼쪽_세로배너-4", name: "왼쪽_세로배너-4", top: 733, left: 4, width: 78, height: 305, image_w:160, image_h:600 },
                { id: "왼쪽_세로배너-5", name: "왼쪽_세로배너-5", top: 1037, left: 4, width: 78, height: 117, image_w:160, image_h:226 },
                { id: "왼쪽_세로배너-6", name: "왼쪽_세로배너-6", top: 1153, left: 4, width: 78, height: 229, image_w:160, image_h:450 },
                { id: "왼쪽_세로배너-7", name: "왼쪽_세로배너-7", top: 1383, left: 4, width: 78, height: 115, image_w:160, image_h:226 },
                { id: "왼쪽_세로배너-8", name: "왼쪽_세로배너-8", top: 1500, left: 4, width: 78, height: 226, image_w:160, image_h:450 },
                { id: "왼쪽_세로배너-9", name: "왼쪽_세로배너-9", top: 1724, left: 4, width: 78, height: 233, image_w:160, image_h:450 },
                
                { id: "오른쪽_세로배너-1", name: "오른쪽_세로배너-1", top: 90, left: 718, width: 77, height: 297, image_w:160, image_h:600 },
                { id: "오른쪽_세로배너-2", name: "오른쪽_세로배너-2", top: 390, left: 718, width: 77, height: 180, image_w:160, image_h:358 },
                { id: "오른쪽_세로배너-3", name: "오른쪽_세로배너-3", top: 570, left: 718, width: 77, height: 161, image_w:160, image_h:315 },
                { id: "오른쪽_세로배너-4", name: "오른쪽_세로배너-4", top: 732, left: 718, width: 77, height: 299, image_w:160, image_h:600 },
                { id: "오른쪽_세로배너-5", name: "오른쪽_세로배너-5", top: 1037, left: 718, width: 77, height: 178, image_w:160, image_h:358 },
                { id: "오른쪽_세로배너-6", name: "오른쪽_세로배너-6", top: 1216, left: 718, width: 77, height: 160, image_w:160, image_h:315 },
                { id: "오른쪽_세로배너-7", name: "오른쪽_세로배너-7", top: 1378, left: 718, width: 77, height: 181, image_w:160, image_h:358 },
                { id: "오른쪽_세로배너-8", name: "오른쪽_세로배너-8", top: 1559, left: 718, width: 77, height: 161, image_w:160, image_h:315 },                
                { id: "오른쪽_세로배너-9", name: "오른쪽_세로배너-9", top: 1720, left: 718, width: 77, height: 227, image_w:160, image_h:450 },

                { id: "오른쪽-1", name: "오른쪽-1", top: 85, left: 564, width: 145, height: 126, image_w:294, image_h:251 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 220, left: 564, width: 145, height: 126, image_w:294, image_h:251 },                
                { id: "오른쪽-3", name: "오른쪽-3", top: 470, left: 564, width: 145, height: 113, image_w:294, image_h:235 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 736, left: 564, width: 145, height: 60, image_w:294, image_h:121 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 804, left: 564, width: 145, height: 60, image_w:294, image_h:121 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 868, left: 564, width: 145, height: 60, image_w:294, image_h:121 },
                { id: "오른쪽-7", name: "오른쪽-7", top: 933, left: 564, width: 145, height: 80, image_w:294, image_h:165 },
                { id: "오른쪽-8", name: "오른쪽-8", top: 1021, left: 564, width: 145, height: 113, image_w:294, image_h:235 },
                { id: "오른쪽-9", name: "오른쪽-9", top: 1508, left: 564, width: 145, height: 113, image_w:294, image_h:235 },
                
                { id: "중앙_작은_배너-1", name: "중앙_작은_배너-1", top: 270, left: 90, width: 133, height: 35, image_w:262, image_h:72 },
                { id: "중앙_작은_배너-2", name: "중앙_작은_배너-2", top: 271, left: 224, width: 129, height: 35, image_w:262, image_h:72 },                
                { id: "중앙_큰배너", name: "중앙_큰배너", top: 1572, left: 90, width: 459, height: 111, image_w:930, image_h:233 }
            ]
        },

        "banner_newshome": {
            image: "/ad/images/main_banner2.jpg",
            baseWidth: 800,
            baseHeight: 2048,

            banners: [
                { id: "왼쪽상단", name: "왼쪽상단", top: 304, left: 12, width: 178, height: 160, image_w:288, image_h:244 },
                { id: "오른쪽상단", name: "오른쪽상단", top: 338, left: 614, width: 187, height: 114, image_w:288, image_h:162 },
                { id: "중앙긴배너", name: "중앙긴배너", top: 467, left: 5, width: 795, height: 99, image_w:1248, image_h:150 },
                { id: "중앙배너", name: "중앙배너", top: 889, left: 5, width: 589, height: 151, image_w:928, image_h:234 },
                { id: "하단_중앙배너", name: "하단_중앙배너", top: 1891, left: 7, width: 587, height: 148, image_w:928, image_h:234 },
                { id: "오른쪽-1", name: "오른쪽-1", top: 580, left: 613, width: 187, height: 232, image_w:288, image_h:360 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 947, left: 615, width: 184, height: 105, image_w:288, image_h:162 },
                { id: "오른쪽-3", name: "오른쪽-3", top: 1167, left: 612, width: 187, height: 145, image_w:288, image_h:230 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 1368, left: 615, width: 186, height: 102, image_w:288, image_h:154 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 1471, left: 616, width: 185, height: 183, image_w:288, image_h:288 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 1656, left: 615, width: 185, height: 187, image_w:288, image_h:288 }
            ]
        },

        "banner_news": {
            image: "/ad/images/main_banner3.jpg",
            baseWidth: 800,
            baseHeight: 678,

            banners: [
                { id: "상단-1", name: "상단-1", top: 90, left: 3, width: 194, height: 84, image_w:298, image_h:122 },
                { id: "상단-2", name: "상단-2", top: 89, left: 204, width: 192, height: 83, image_w:298, image_h:122 },
                { id: "상단-3", name: "상단-3", top: 90, left: 406, width: 189, height: 82, image_w:298, image_h:122 },
                { id: "하단중앙", name: "하단중앙", top: 521, left: 6, width: 590, height: 149, image_w:928, image_h:234 }
            ]
        },

        "banner_youtube": {
            image: "/ad/images/main_banner4.jpg",
            baseWidth: 800,
            baseHeight: 1930,

            banners: [
                { id: "오른쪽-1", name: "오른쪽-1", top: 95, left: 612, width: 185, height: 194, image_w:288, image_h:300 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 554, left: 614, width: 184, height: 252, image_w:288, image_h:395 },
                { id: "오른쪽-3", name: "오른쪽-3", top: 1111, left: 617, width: 182, height: 115, image_w:288, image_h:230 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 1230, left: 615, width: 184, height: 102, image_w:288, image_h:154 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 1331, left: 613, width: 185, height: 186, image_w:288, image_h:288 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 1519, left: 615, width: 183, height: 184, image_w:288, image_h:288 }
            ]
        },

        "banner_community": {
            image: "/ad/images/main_banner5.jpg",
            baseWidth: 800,
            baseHeight: 2376,

            banners: [
                { id: "중앙배너-1", name: "중앙배너-1", top: 389, left: 3, width: 196, height: 79, image_w:298, image_h:122 },
                { id: "중앙배너-2", name: "중앙배너-2", top: 388, left: 205, width: 194, height: 82, image_w:298, image_h:122 },
                { id: "중앙배너-3", name: "중앙배너-3", top: 385, left: 405, width: 189, height: 79, image_w:298, image_h:122 },

                { id: "큰_중앙배너", name: "큰_중앙배너", top: 1047, left: 5, width: 588, height: 149, image_w:928, image_h:234 },

                { id: "중앙배너-4", name: "중앙배너-4", top: 1999, left: 4, width: 191, height: 81, image_w:298, image_h:122 },
                { id: "중앙배너-5", name: "중앙배너-5", top: 1998, left: 204, width: 191, height: 80, image_w:298, image_h:122 },
                { id: "중앙배너-6", name: "중앙배너-6", top: 1999, left: 404, width: 190, height: 81, image_w:298, image_h:122 },

                { id: "하단_중앙배너", name: "하단_중앙배너", top: 2294, left: 4, width: 590, height: 76, image_w:928, image_h:112 },

                { id: "오른쪽-1", name: "오른쪽-1", top: 95, left: 614, width: 186, height: 232, image_w:288, image_h:576 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 328, left: 614, width: 185, height: 105, image_w:288, image_h:162 },
                { id: "오른쪽-3", name: "오른쪽-3", top: 436, left: 614, width: 184, height: 228, image_w:288, image_h:360 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 666, left: 613, width: 185, height: 184, image_w:288, image_h:288 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 852, left: 612, width: 184, height: 184, image_w:288, image_h:288 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 1036, left: 613, width: 187, height: 234, image_w:288, image_h:576 },
                { id: "오른쪽-7", name: "오른쪽-7", top: 1274, left: 613, width: 186, height: 234, image_w:288, image_h:360 },
                { id: "오른쪽-8", name: "오른쪽-8", top: 1505, left: 614, width: 182, height: 145, image_w:288, image_h:230 },
                { id: "오른쪽-9", name: "오른쪽-9", top: 1650, left: 613, width: 182, height: 185, image_w:288, image_h:288 },
                { id: "오른쪽-10", name: "오른쪽-10", top: 1833, left: 611, width: 184, height: 189, image_w:288, image_h:288 }
            ]
        },

        "banner_town": {
            image: "/ad/images/main_banner6.jpg",
            baseWidth: 800,
            baseHeight: 2184,

            banners: [
                { id: "중앙배너-1", name: "중앙배너-1", top: 898, left: 9, width: 289, height: 122, image_w:455, image_h:188 },
                { id: "중앙배너-2", name: "중앙배너-2", top: 903, left: 306, width: 290, height: 116, image_w:455, image_h:188 },
                { id: "하단_중앙배너", name: "하단_중앙배너", top: 1497, left: 8, width: 588, height: 158, image_w:928, image_h:268 },

                { id: "오른쪽-1", name: "오른쪽-1", top: 104, left: 613, width: 184, height: 256, image_w:288, image_h:403 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 358, left: 613, width: 186, height: 236, image_w:288, image_h:395 },
                { id: "오른쪽-3", name: "오른쪽-3", top: 601, left: 615, width: 185, height: 228, image_w:288, image_h:360 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 830, left: 615, width: 183, height: 182, image_w:288, image_h:288 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 1012, left: 614, width: 185, height: 184, image_w:288, image_h:288 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 1196, left: 614, width: 185, height: 234, image_w:288, image_h:576 },
                { id: "오른쪽-7", name: "오른쪽-7", top: 1433, left: 614, width: 183, height: 231, image_w:288, image_h:360 },
                { id: "오른쪽-8", name: "오른쪽-8", top: 1665, left: 615, width: 184, height: 143, image_w:288, image_h:230 },
                { id: "오른쪽-9", name: "오른쪽-9", top: 1810, left: 616, width: 179, height: 182, image_w:288, image_h:288 },
                { id: "오른쪽-10", name: "오른쪽-10", top: 1996, left: 614, width: 183, height: 184, image_w:288, image_h:288 }
            ]
        },

        "banner_realestate": {
            image: "/ad/images/main_banner7.jpg",
            baseWidth: 800,
            baseHeight: 1418,

            banners: [
                { id: "오른쪽-1", name: "오른쪽-1", top: 95, left: 615, width: 184, height: 228, image_w:288, image_h:360 },
                { id: "오른쪽-2", name: "오른쪽-2", top: 481, left: 613, width: 184, height: 252, image_w:288, image_h:395 },
                { id: "오른쪽-3", name: "오른쪽-3", top: 874, left: 612, width: 188, height: 119, image_w:288, image_h:230 },
                { id: "오른쪽-4", name: "오른쪽-4", top: 994, left: 613, width: 186, height: 72, image_w:288, image_h:154 },
                { id: "오른쪽-5", name: "오른쪽-5", top: 1067, left: 614, width: 181, height: 160, image_w:288, image_h:288 },
                { id: "오른쪽-6", name: "오른쪽-6", top: 1226, left: 614, width: 187, height: 186, image_w:288, image_h:288 }
            ]
        }
    };


    const radioButtons =
        document.querySelectorAll('input[name="banner_type"]');

    const panels =
        document.querySelectorAll('.ad-content-panel');

    const popupModal =
        document.getElementById('popupModal');

    const targetImage =
        document.getElementById('targetImage');

    const highlightBox =
        document.getElementById('highlightBox');

    const closeBtn =
        document.getElementById('closeBtn');


    // 1. 셀렉트박스 데이터 주입
    function initBannerSelects() {

        panels.forEach(panel => {

            const key =
                panel.id.replace('panel_', '');

            const data =
                adData[key];

            if (data) {

                panel.setAttribute(
                    'data-image',
                    data.image
                );

                panel.setAttribute(
                    'data-basewidth',
                    data.baseWidth
                );

                panel.setAttribute(
                    'data-baseheight',
                    data.baseHeight
                );

                const selectBox =
                    panel.querySelector('.bannerSelect');

                if (selectBox) {

                    let optionsHtml =
                        '<option value="">배너를 선택하세요</option>';

                    data.banners.forEach(b => {

                        optionsHtml +=
                            `<option
                                value="${b.id}"
                                data-top="${b.top}"
                                data-left="${b.left}"
                                data-width="${b.width}"
                                data-height="${b.height}">
                                ${b.name}
                            </option>`;
                    });

                    selectBox.innerHTML =
                        optionsHtml;
                }
            }
        });
    }


    // 2. 라디오 버튼 전환
    radioButtons.forEach(radio => {

        radio.addEventListener(
            'change',
            function() {

                const targetId =
                    'panel_' + this.value;

                panels.forEach(panel => {

                    if (panel.id === targetId) {

                        panel.classList.add(
                            'active'
                        );

                    } else {

                        panel.classList.remove(
                            'active'
                        );
                    }
                });
            }
        );
    });


    // 3. 위치보기
    document
        .querySelectorAll('.viewBtn')
        .forEach(btn => {

            btn.addEventListener(
                'click',
                function() {

                    const panel =
                        this.closest(
                            '.ad-content-panel'
                        );

                    const bannerSelect =
                        panel.querySelector(
                            '.bannerSelect'
                        );

                    const selectedOption =
                        bannerSelect.options[
                            bannerSelect.selectedIndex
                        ];

                    if (
                        !selectedOption ||
                        !selectedOption.value
                    ) {

                        alert(
                            '확인할 배너를 먼저 선택해주세요!'
                        );

                        return;
                    }

                    targetImage.src =
                        panel.getAttribute(
                            'data-image'
                        );

                    popupModal.style.display =
                        'flex';

                    targetImage.onload =
                        function() {

                            updateHighlightPosition(
                                panel,
                                selectedOption
                            );
                        };

                    if (targetImage.complete) {

                        updateHighlightPosition(
                            panel,
                            selectedOption
                        );
                    }
                }
            );
        });


    function updateHighlightPosition(
        panel,
        selectedOption
    ) {

        const baseWidth =
            parseFloat(
                panel.getAttribute(
                    'data-basewidth'
                )
            );

        const baseHeight =
            parseFloat(
                panel.getAttribute(
                    'data-baseheight'
                )
            );

        const origTop =
            parseFloat(
                selectedOption.getAttribute(
                    'data-top'
                )
            );

        const origLeft =
            parseFloat(
                selectedOption.getAttribute(
                    'data-left'
                )
            );

        const origWidth =
            parseFloat(
                selectedOption.getAttribute(
                    'data-width'
                )
            );

        const origHeight =
            parseFloat(
                selectedOption.getAttribute(
                    'data-height'
                )
            );

        const currentWidth =
            targetImage.clientWidth;

        const currentHeight =
            targetImage.clientHeight;

        const scaleX =
            currentWidth / baseWidth;

        const scaleY =
            currentHeight / baseHeight;

        highlightBox.style.top =
            (origTop * scaleY) + 'px';

        highlightBox.style.left =
            (origLeft * scaleX) + 'px';

        highlightBox.style.width =
            (origWidth * scaleX) + 'px';

        highlightBox.style.height =
            (origHeight * scaleY) + 'px';

        highlightBox.style.display =
            'block';
    }


    window.addEventListener(
        'resize',
        function() {

            if (
                popupModal.style.display ===
                'flex'
            ) {

                const activePanel =
                    document.querySelector(
                        '.ad-content-panel.active'
                    );

                const bannerSelect =
                    activePanel.querySelector(
                        '.bannerSelect'
                    );

                const selectedOption =
                    bannerSelect.options[
                        bannerSelect.selectedIndex
                    ];

                if (
                    selectedOption &&
                    selectedOption.value
                ) {

                    updateHighlightPosition(
                        activePanel,
                        selectedOption
                    );
                }
            }
        }
    );


    // 4. 모달 닫기
    function closeModal() {

        popupModal.style.display =
            'none';

        highlightBox.style.display =
            'none';
    }


    if (closeBtn) {

        closeBtn.addEventListener(
            'click',
            closeModal
        );
    }


    popupModal.addEventListener(
        'click',
        function(e) {

            if (e.target === popupModal) {

                closeModal();
            }
        }
    );


    // 최초 실행
    initBannerSelects();

    banner_data = adData;

});