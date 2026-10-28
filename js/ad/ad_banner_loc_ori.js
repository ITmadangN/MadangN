

    var banner_data;
     
        document.addEventListener("DOMContentLoaded", function() {
           const adData = {
                "banner_home": {
                    image: "/ad/images/main_banner.jpg",
                    baseWidth: 800,  
                    baseHeight: 1514, 
                    banners: [
                        { id: "왼쪽 세로배너-1", name: "왼쪽 세로배너-1", top: 89, left: 4, width: 78, height: 300, image_w:160, image_h:600 },
                        { id: "왼쪽 세로배너-2", name: "왼쪽 세로배너-2", top: 394, left: 4, width: 78, height: 112, image_w:160, image_h:222 },
                        { id: "중앙 작은 배너-1", name: "중앙 작은 배너-1", top: 313, left: 90, width: 133, height: 35, image_w:526, image_h:144 },
                        { id: "중앙 작은 배너-2", name: "중앙 작은 배너-2", top: 313, left: 224, width: 129, height: 35, image_w:526, image_h:144 },
                        { id: "오른쪽-1", name: "오른쪽-1", top: 90, left: 564, width: 145, height: 126, image_w:588, image_h:504 },
                        { id: "오른쪽-2", name: "오른쪽-2", top: 219, left: 564, width: 145, height: 126, image_w:588, image_h:504 },
                        { id: "오른쪽 세로배너", name: "오른쪽 세로배너", top: 90, left: 718, width: 77, height: 297, image_w:160, image_h:600 },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 473, left: 564, width: 145, height: 113, image_w:588, image_h:472 },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 753, left: 564, width: 145, height: 60, image_w:588, image_h:244 },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 817, left: 564, width: 145, height: 60, image_w:588, image_h:244 },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 880, left: 564, width: 145, height: 60, image_w:588, image_h:244 },
                        { id: "오른쪽-7", name: "오른쪽-7", top: 944, left: 564, width: 145, height: 80, image_w:588, image_h:332 },
                        { id: "오른쪽-8", name: "오른쪽-8", top: 1031, left: 564, width: 145, height: 113, image_w:588, image_h:472 },
                        { id: "오른쪽-9", name: "오른쪽-9", top: 1341, left: 564, width: 145, height: 113, image_w:588, image_h:472 },
                        { id: "중앙 큰배너", name: "중앙 큰배너", top: 1340, left: 90, width: 459, height: 111, image_w:930, image_h:233 }
                    ]
                },
                "banner_newshome": {
                    image: "/ad/images/main_banner2.jpg",
                    baseWidth: 800,
                    baseHeight: 2048,
                    banners: [
                        { id: "왼쪽상단", name: "왼쪽상단", top: 300, left: 5, width: 183, height: 155, image_w:288, image_h:244 },
                        { id: "오른쪽상단", name: "오른쪽상단", top: 338, left: 613, width: 183, height: 102, image_w:288, image_h:162 },
                        { id: "중앙긴배너", name: "중앙긴배너", top: 470, left: 5, width: 790, height: 93, image_w:1248, image_h:150 },
                        { id: "중앙배너", name: "중앙배너", top: 891, left: 5, width: 588, height: 150, image_w:928, image_h:234 },
                        { id: "하단 중앙배너", name: "하단 중앙배너", top: 1892, left: 5, width: 588, height: 147, image_w:928, image_h:234 },
                        { id: "오른쪽-1", name: "오른쪽-1", top: 582, left: 614, width: 183, height: 228, image_w:288, image_h:360 },
                        { id: "오른쪽-2", name: "오른쪽-2", top: 946, left: 614, width: 183, height: 104, image_w:288, image_h:162 },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 1168, left: 614, width: 183, height: 142, image_w:288, image_h:230 },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 1369, left: 614, width: 183, height: 100, image_w:288, image_h:154 },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 1472, left: 614, width: 183, height: 184, image_w:288, image_h:288 },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 1657, left: 614, width: 183, height: 184, image_w:288, image_h:288 }
                    ]
                },
                "banner_news": {
                    image: "/ad/images/main_banner3.jpg",
                    baseWidth: 800, baseHeight: 678,
                    banners: [
                        { id: "상단-1", name: "상단-1", top: 90, left: 5, width: 189, height: 78, image_w:298, image_h:122 },
                        { id: "상단-2", name: "상단-2", top: 90, left: 207, width: 189, height: 78, image_w:298, image_h:122 },
                        { id: "상단-3", name: "상단-3", top: 90, left: 407, width: 189, height: 78, image_w:298, image_h:122 },
                        { id: "하단중앙", name: "하단중앙", top: 521, left: 5, width: 587, height: 147, image_w:928, image_h:234 }
                    ]
                },
                "banner_youtube": {
                    image: "/ad/images/main_banner4.jpg",
                    baseWidth: 800, baseHeight: 1930,
                    banners: [
                        { id: "오른쪽-1", name: "오른쪽-1", top: 99, left: 614, width: 182, height: 190 , image_w:288, image_h:300},
                        { id: "오른쪽-2", name: "오른쪽-2", top: 556, left: 614, width: 182, height: 247, image_w:288, image_h:395 },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 1088, left: 614, width: 182, height: 138, image_w:288, image_h:230 },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 1229, left: 614, width: 182, height: 98, image_w:288, image_h:154 },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 1332, left: 614, width: 182, height: 183, image_w:288, image_h:288 },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 1522, left: 614, width: 182, height: 183, image_w:928, image_h:288 }
            ]
                },
                "banner_community": {
                    image: "/ad/images/main_banner5.jpg",
                    baseWidth: 800, baseHeight: 2376,
                    banners: [
                        { id: "중앙배너-1", name: "중앙배너-1", top: 389, left: 5, width: 189, height: 78, image_w:298, image_h:122 },
                        { id: "중앙배너-2", name: "중앙배너-2", top: 389, left: 204, width: 189, height: 78, image_w:298, image_h:122  },
                        { id: "중앙배너-3", name: "중앙배너-3", top: 389, left: 404, width: 189, height: 78, image_w:298, image_h:122  },
                        { id: "큰 중앙배너", name: "큰 중앙배너", top: 1047, left: 5, width: 587, height: 145, image_w:928, image_h:234  },
                        { id: "중앙배너-4", name: "중앙배너-4", top: 2004, left: 4, width: 298, height: 122, image_w:298, image_h:122  },
                        { id: "중앙배너-5", name: "중앙배너-5", top: 394, left: 4, width: 78, height: 112, image_w:298, image_h:122  },
                        { id: "중앙배너-6", name: "중앙배너-6", top: 313, left: 90, width: 133, height: 35, image_w:298, image_h:122  },
                        { id: "하단 중앙배너", name: "하단 중앙배너", top: 313, left: 224, width: 587, height: 35, image_w:928, image_h:112  },
                        { id: "오른쪽-1", name: "오른쪽-1", top: 90, left: 564, width: 145, height: 126, image_w:288, image_h:576  },
                        { id: "오른쪽-2", name: "오른쪽-2", top: 219, left: 564, width: 145, height: 126, image_w:288, image_h:162  },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 473, left: 564, width: 145, height: 113, image_w:288, image_h:360  },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 753, left: 564, width: 145, height: 60, image_w:288, image_h:288  },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 817, left: 564, width: 145, height: 60, image_w:288, image_h:288  },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 880, left: 564, width: 145, height: 60, image_w:288, image_h:576  },
                        { id: "오른쪽-7", name: "오른쪽-7", top: 944, left: 564, width: 145, height: 80, image_w:288, image_h:360  },
                        { id: "오른쪽-8", name: "오른쪽-8", top: 1031, left: 564, width: 145, height: 113, image_w:288, image_h:230  },
                        { id: "오른쪽-9", name: "오른쪽-9", top: 1341, left: 564, width: 145, height: 113, image_w:288, image_h:288  },
                        { id: "오른쪽-10", name: "오른쪽-10", top: 1340, left: 90, width: 459, height: 111, image_w:288, image_h:288  }
            
            ]
                },
                "banner_town": {
                    image: "/ad/images/main_banner6.jpg",
                    baseWidth: 800, baseHeight: 2184,
                    banners: [
                        { id: "중앙배너-1", name: "중앙배너-1", top: 901, left: 6, width: 288, height: 119, image_w:455, image_h:188  },
                        { id: "중앙배너-2", name: "중앙배너-2", top: 901, left: 307, width: 288, height: 119, image_w:455, image_h:188  },
                        { id: "하단 중앙배너", name: "하단 중앙배너", top: 1500, left: 6, width: 587, height: 155, image_w:928, image_h:268  },
                        { id: "오른쪽-1", name: "오른쪽-1", top: 105, left: 614, width: 145, height: 126, image_w:288, image_h:403  },
                        { id: "오른쪽-2", name: "오른쪽-2", top: 219, left: 564, width: 145, height: 126, image_w:288, image_h:395  },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 473, left: 564, width: 145, height: 113, image_w:288, image_h:360  },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 753, left: 564, width: 145, height: 60, image_w:288, image_h:288  },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 817, left: 564, width: 145, height: 60, image_w:288, image_h:288  },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 880, left: 564, width: 145, height: 60, image_w:288, image_h:576  },
                        { id: "오른쪽-7", name: "오른쪽-7", top: 944, left: 564, width: 145, height: 80, image_w:288, image_h:360  },
                        { id: "오른쪽-8", name: "오른쪽-8", top: 1031, left: 564, width: 145, height: 113, image_w:288, image_h:230  },
                        { id: "오른쪽-9", name: "오른쪽-9", top: 1341, left: 564, width: 145, height: 113, image_w:288, image_h:288  },
                        { id: "오른쪽-10", name: "오른쪽-10", top: 1340, left: 90, width: 459, height: 111, image_w:288, image_h:288  }
            
            ]
                },
                "banner_realestate": {
                    image: "/ad/images/main_banner7.jpg",
                    baseWidth: 800, baseHeight: 1418,
                    banners: [
                        { id: "오른쪽-1", name: "오른쪽-1", top: 95, left: 613, width: 145, height: 126, image_w:288, image_h:360 },
                        { id: "오른쪽-2", name: "오른쪽-2", top: 483, left: 613, width: 145, height: 126, image_w:288, image_h:395 },
                        { id: "오른쪽-3", name: "오른쪽-3", top: 902, left: 614, width: 145, height: 113, image_w:288, image_h:230 },
                        { id: "오른쪽-4", name: "오른쪽-4", top: 995, left: 614, width: 145, height: 60, image_w:288, image_h:154 },
                        { id: "오른쪽-5", name: "오른쪽-5", top: 1067, left: 614, width: 145, height: 60, image_w:288, image_h:288 },
                        { id: "오른쪽-6", name: "오른쪽-6", top: 1229, left: 614, width: 459, height: 111, image_w:288, image_h:288 }
            
            ]
                }
            };

            const radioButtons = document.querySelectorAll('input[name="banner_type"]');
            const panels = document.querySelectorAll('.ad-content-panel');
            const popupModal = document.getElementById('popupModal');
            const targetImage = document.getElementById('targetImage');
            const highlightBox = document.getElementById('highlightBox');
            const closeBtn = document.getElementById('closeBtn');

            // 1. 셀렉트박스 데이터 주입 (기준 사이즈 정보도 함께 저장)
            function initBannerSelects() {
                panels.forEach(panel => {
                    const key = panel.id.replace('panel_', '');
                    const data = adData[key];
                    
                    if (data) {
                        panel.setAttribute('data-image', data.image);
                        panel.setAttribute('data-basewidth', data.baseWidth);
                        panel.setAttribute('data-baseheight', data.baseHeight);

                        const selectBox = panel.querySelector('.bannerSelect');
                        if (selectBox) {
                            let optionsHtml = '<option value="">배너를 선택하세요</option>';
                            data.banners.forEach(b => {
                                optionsHtml += `<option value="${b.id}" data-top="${b.top}" data-left="${b.left}" data-width="${b.width}" data-height="${b.height}">${b.name}</option>`;
                            });
                            selectBox.innerHTML = optionsHtml;
                        }
                    }
                });
            }

            // 2. 라디오 버튼 전환 이벤트
            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    const targetId = 'panel_' + this.value;
                    panels.forEach(panel => {
                        if (panel.id === targetId) {
                            panel.classList.add('active');
                        } else {
                            panel.classList.remove('active');
                        }
                    });
                });
            });

            // 3. 위치보기 버튼 제어 (모바일 비율 자동 계산 적용)
            document.querySelectorAll('.viewBtn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const panel = this.closest('.ad-content-panel');
                    const bannerSelect = panel.querySelector('.bannerSelect');
                    const selectedOption = bannerSelect.options[bannerSelect.selectedIndex];

                    if (!selectedOption || !selectedOption.value) {
                        alert('확인할 배너를 먼저 선택해주세요!');
                        return;
                    }

                    targetImage.src = panel.getAttribute('data-image');
                    popupModal.style.display = 'flex';

                    // 이미지가 완전히 로드된 후 실제 렌더링된 크기 대비 비율을 계산하여 하이라이트 표시
                    targetImage.onload = function() {
                        updateHighlightPosition(panel, selectedOption);
                    };
                    
                    // 캐시된 이미지일 경우 즉시 실행
                    if (targetImage.complete) {
                        updateHighlightPosition(panel, selectedOption);
                    }
                });
            });

            // 비율 계산 함수 (PC 기준 좌표를 현재 모바일 화면의 이미지 크기에 비례해서 변환)
            function updateHighlightPosition(panel, selectedOption) {
                const baseWidth = parseFloat(panel.getAttribute('data-basewidth'));
                const baseHeight = parseFloat(panel.getAttribute('data-baseheight'));

                const origTop = parseFloat(selectedOption.getAttribute('data-top'));
                const origLeft = parseFloat(selectedOption.getAttribute('data-left'));
                const origWidth = parseFloat(selectedOption.getAttribute('data-width'));
                const origHeight = parseFloat(selectedOption.getAttribute('data-height'));

                // 현재 화면에 실제로 표시되는 이미지의 렌더링 크기
                const currentWidth = targetImage.clientWidth;
                const currentHeight = targetImage.clientHeight;

                // 비율 계산 적용
                const scaleX = currentWidth / baseWidth;
                const scaleY = currentHeight / baseHeight;

                highlightBox.style.top = (origTop * scaleY) + 'px';
                highlightBox.style.left = (origLeft * scaleX) + 'px';
                highlightBox.style.width = (origWidth * scaleX) + 'px';
                highlightBox.style.height = (origHeight * scaleY) + 'px';
                highlightBox.style.display = 'block';
            }

            // 화면 크기가 바뀔 때(모바일 가로/세로 전환 등) 위치 재조정
            window.addEventListener('resize', function() {
                if (popupModal.style.display === 'flex') {
                    const activePanel = document.querySelector('.ad-content-panel.active');
                    const bannerSelect = activePanel.querySelector('.bannerSelect');
                    const selectedOption = bannerSelect.options[bannerSelect.selectedIndex];
                    if (selectedOption && selectedOption.value) {
                        updateHighlightPosition(activePanel, selectedOption);
                    }
                }
            });

            // 4. 모달 닫기 제어
            function closeModal() {
                popupModal.style.display = 'none';
                highlightBox.style.display = 'none';
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            popupModal.addEventListener('click', function(e) {
                if (e.target === popupModal) {
                    closeModal();
                }
            });

            // 최초 실행
            initBannerSelects();
            
            banner_data = adData;
            
        });
