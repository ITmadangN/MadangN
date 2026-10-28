document.addEventListener("DOMContentLoaded", function () {

    /*
     * =========================================================
     * 관리자 상세보기에서 이미 알고 있는 값
     * =========================================================
     *
     * PHP에서 실제 값으로 치환됨
     *
     * 예:
     * T_BANNER_TYPE     = banner_home
     * T_BANNER_LOCATION = 오른쪽-1
     *
     */

    const bannerTypeElement = document.getElementById("bannerTypeValue");
    const bannerLocationElement = document.getElementById("bannerLocationValue");




    /*
     * =========================================================
     * 배너 위치 데이터
     * =========================================================
     */

    const adData = {

        "banner_home": {
            image: "/ad/images/main_banner.jpg",
            baseWidth: 800,
            baseHeight: 1957,

            banners: [
                {
                    id: "왼쪽_세로배너-1",
                    top: 85,
                    left: 3,
                    width: 83,
                    height: 302
                },
                {
                    id: "왼쪽_세로배너-2",
                    top: 389,
                    left: 3,
                    width: 80,
                    height: 118
                },
                {
                    id: "왼쪽_세로배너-3",
                    top: 504,
                    left: 2,
                    width: 84,
                    height: 230
                },
                {
                    id: "왼쪽_세로배너-4",
                    top: 733,
                    left: 1,
                    width: 84,
                    height: 305
                },
                {
                    id: "왼쪽_세로배너-5",
                    top: 1037,
                    left: 1,
                    width: 83,
                    height: 117
                },
                {
                    id: "왼쪽_세로배너-6",
                    top: 1153,
                    left: 2,
                    width: 83,
                    height: 229
                },
                {
                    id: "왼쪽_세로배너-7",
                    top: 1383,
                    left: 3,
                    width: 82,
                    height: 115
                },
                {
                    id: "왼쪽_세로배너-8",
                    top: 1500,
                    left: 4,
                    width: 80,
                    height: 226
                },
                {
                    id: "왼쪽_세로배너-9",
                    top: 1724,
                    left: 3,
                    width: 82,
                    height: 233
                },               
                {
                    id: "중앙_작은_배너-1",
                    top: 270,
                    left: 90,
                    width: 133,
                    height: 35
                },
                {
                    id: "중앙_작은_배너-2",
                    top: 271,
                    left: 224,
                    width: 129,
                    height: 35
                },   
                {
                    id: "중앙_큰배너",
                    top: 1572,
                    left: 90,
                    width: 459,
                    height: 111
                },             
                {
                    id: "오른쪽_세로배너-1",
                    top: 87,
                    left: 718,
                    width: 83,
                    height: 299
                },
                {
                    id: "오른쪽_세로배너-2",
                    top: 390,
                    left: 718,
                    width: 83,
                    height: 180
                },
                {
                    id: "오른쪽_세로배너-3",
                    top: 570,
                    left: 718,
                    width: 83,
                    height: 161
                },
                {
                    id: "오른쪽_세로배너-4",
                    top: 732,
                    left: 719,
                    width: 79,
                    height: 299
                },
                {
                    id: "오른쪽_세로배너-5",
                    top: 1037,
                    left: 717,
                    width: 83,
                    height: 178
                },
                {
                    id: "오른쪽_세로배너-6",
                    top: 1216,
                    left: 720,
                    width: 81,
                    height: 160
                },
                {
                    id: "오른쪽_세로배너-7",
                    top: 1378,
                    left: 718,
                    width: 83,
                    height: 181
                },
                {
                    id: "오른쪽_세로배너-8",
                    top: 1559,
                    left: 718,
                    width: 81,
                    height: 161
                },
                {
                    id: "오른쪽_세로배너-9",
                    top: 1720,
                    left: 716,
                    width: 84,
                    height: 227
                },
                {
                    id: "오른쪽-1",
                    top: 85,
                    left: 564,
                    width: 145,
                    height: 126
                },
                {
                    id: "오른쪽-2",
                    top: 220,
                    left: 564,
                    width: 145,
                    height: 126
                },
                {
                    id: "오른쪽-3",
                    top: 470,
                    left: 564,
                    width: 145,
                    height: 113
                },
                {
                    id: "오른쪽-4",
                    top: 736,
                    left: 564,
                    width: 145,
                    height: 60
                },
                {
                    id: "오른쪽-5",
                    top: 804,
                    left: 564,
                    width: 145,
                    height: 60
                },
                {
                    id: "오른쪽-6",
                    top: 868,
                    left: 564,
                    width: 145,
                    height: 60
                },
                {
                    id: "오른쪽-7",
                    top: 933,
                    left: 564,
                    width: 145,
                    height: 80
                },
                {
                    id: "오른쪽-8",
                    top: 1021,
                    left: 564,
                    width: 145,
                    height: 113
                },
                {
                    id: "오른쪽-9",
                    top: 1508,
                    left: 564,
                    width: 145,
                    height: 113
                },
            ]
        },


        "banner_newshome": {
            image: "/ad/images/main_banner2.jpg",
            baseWidth: 800,
            baseHeight: 2048,

            banners: [
                {
                    id: "왼쪽상단",
                    top: 304,
                    left: 12,
                    width: 178,
                    height: 160
                },
                {
                    id: "오른쪽상단",
                    top: 338,
                    left: 614,
                    width: 187,
                    height: 114
                },
                {
                    id: "중앙긴배너",
                    top: 467,
                    left: 5,
                    width: 795,
                    height: 99
                },
                {
                    id: "중앙배너",
                    top: 889,
                    left: 5,
                    width: 589,
                    height: 151
                },
                {
                    id: "하단_중앙배너",
                    top: 1891,
                    left: 7,
                    width: 587,
                    height: 148
                },
                {
                    id: "오른쪽-1",
                    top: 580,
                    left: 613,
                    width: 187,
                    height: 232
                },
                {
                    id: "오른쪽-2",
                    top: 947,
                    left: 615,
                    width: 184,
                    height: 105
                },
                {
                    id: "오른쪽-3",
                    top: 1167,
                    left: 612,
                    width: 187,
                    height: 145
                },
                {
                    id: "오른쪽-4",
                    top: 1368,
                    left: 615,
                    width: 186,
                    height: 102
                },
                {
                    id: "오른쪽-5",
                    top: 1471,
                    left: 616,
                    width: 185,
                    height: 183
                },
                {
                    id: "오른쪽-6",
                    top: 1656,
                    left: 615,
                    width: 185,
                    height: 187
                }
            ]
        },


        "banner_news": {
            image: "/ad/images/main_banner3.jpg",
            baseWidth: 800,
            baseHeight: 678,

            banners: [
                {
                    id: "상단-1",
                    top: 90,
                    left: 3,
                    width: 194,
                    height: 84
                },
                {
                    id: "상단-2",
                    top: 89,
                    left: 204,
                    width: 192,
                    height: 83
                },
                {
                    id: "상단-3",
                    top: 90,
                    left: 406,
                    width: 189,
                    height: 82
                },
                {
                    id: "하단중앙",
                    top: 521,
                    left: 6,
                    width: 590,
                    height: 149
                }
            ]
        },


        "banner_youtube": {
            image: "/ad/images/main_banner4.jpg",
            baseWidth: 800,
            baseHeight: 1930,

            banners: [
                {
                    id: "오른쪽-1",
                    top: 95,
                    left: 612,
                    width: 185,
                    height: 194
                },
                {
                    id: "오른쪽-2",
                    top: 554,
                    left: 614,
                    width: 184,
                    height: 252
                },
                {
                    id: "오른쪽-3",
                    top: 1111,
                    left: 617,
                    width: 182,
                    height: 115
                },
                {
                    id: "오른쪽-4",
                    top: 1230,
                    left: 615,
                    width: 184,
                    height: 102
                },
                {
                    id: "오른쪽-5",
                    top: 1331,
                    left: 613,
                    width: 185,
                    height: 186
                },
                {
                    id: "오른쪽-6",
                    top: 1519,
                    left: 615,
                    width: 183,
                    height: 184
                }
            ]
        },


        "banner_community": {
            image: "/ad/images/main_banner5.jpg",
            baseWidth: 800,
            baseHeight: 2376,

            banners: [
                {
                    id: "중앙배너-1",
                    top: 389,
                    left: 3,
                    width: 196,
                    height: 79
                },
                {
                    id: "중앙배너-2",
                    top: 388,
                    left: 205,
                    width: 194,
                    height: 82
                },
                {
                    id: "중앙배너-3",
                    top: 385,
                    left: 405,
                    width: 189,
                    height: 79
                },
                {
                    id: "큰_중앙배너",
                    top: 1047,
                    left: 5,
                    width: 588,
                    height: 149
                },
                {
                    id: "중앙배너-4",
                    top: 1999,
                    left: 4,
                    width: 191,
                    height: 81
                },
                {
                    id: "중앙배너-5",
                    top: 1998,
                    left: 204,
                    width: 191,
                    height: 80
                },
                {
                    id: "중앙배너-6",
                    top: 1999,
                    left: 404,
                    width: 190,
                    height: 81
                },
                {
                    id: "하단_중앙배너",
                    top: 2294,
                    left: 4,
                    width: 590,
                    height: 76
                },
                {
                    id: "오른쪽-1",
                    top: 95,
                    left: 614,
                    width: 186,
                    height: 232
                },
                {
                    id: "오른쪽-2",
                    top: 328,
                    left: 614,
                    width: 185,
                    height: 105
                },
                {
                    id: "오른쪽-3",
                    top: 436,
                    left: 614,
                    width: 184,
                    height: 228
                },
                {
                    id: "오른쪽-4",
                    top: 666,
                    left: 613,
                    width: 185,
                    height: 184
                },
                {
                    id: "오른쪽-5",
                    top: 852,
                    left: 612,
                    width: 184,
                    height: 184
                },
                {
                    id: "오른쪽-6",
                    top: 1036,
                    left: 613,
                    width: 187,
                    height: 234
                },
                {
                    id: "오른쪽-7",
                    top: 1274,
                    left: 613,
                    width: 186,
                    height: 234
                },
                {
                    id: "오른쪽-8",
                    top: 1505,
                    left: 614,
                    width: 182,
                    height: 145
                },
                {
                    id: "오른쪽-9",
                    top: 1650,
                    left: 613,
                    width: 182,
                    height: 185
                },
                {
                    id: "오른쪽-10",
                    top: 1833,
                    left: 611,
                    width: 184,
                    height: 189
                }
            ]
        },


        "banner_town": {
            image: "/ad/images/main_banner6.jpg",
            baseWidth: 800,
            baseHeight: 2184,

            banners: [
                {
                    id: "중앙배너-1",
                    top: 898,
                    left: 9,
                    width: 289,
                    height: 122
                },
                {
                    id: "중앙배너-2",
                    top: 903,
                    left: 306,
                    width: 290,
                    height: 116
                },
                {
                    id: "하단_중앙배너",
                    top: 1497,
                    left: 8,
                    width: 588,
                    height: 158
                },
                {
                    id: "오른쪽-1",
                    top: 104,
                    left: 613,
                    width: 184,
                    height: 256
                },
                {
                    id: "오른쪽-2",
                    top: 358,
                    left: 613,
                    width: 186,
                    height: 236
                },
                {
                    id: "오른쪽-3",
                    top: 601,
                    left: 615,
                    width: 185,
                    height: 228
                },
                {
                    id: "오른쪽-4",
                    top: 830,
                    left: 615,
                    width: 183,
                    height: 182
                },
                {
                    id: "오른쪽-5",
                    top: 1012,
                    left: 614,
                    width: 185,
                    height: 184
                },
                {
                    id: "오른쪽-6",
                    top: 1196,
                    left: 614,
                    width: 185,
                    height: 234
                },
                {
                    id: "오른쪽-7",
                    top: 1433,
                    left: 614,
                    width: 183,
                    height: 231
                },
                {
                    id: "오른쪽-8",
                    top: 1665,
                    left: 615,
                    width: 184,
                    height: 143
                },
                {
                    id: "오른쪽-9",
                    top: 1810,
                    left: 616,
                    width: 179,
                    height: 182
                },
                {
                    id: "오른쪽-10",
                    top: 1996,
                    left: 614,
                    width: 183,
                    height: 184
                }
            ]
        },


        "banner_realestate": {
            image: "/ad/images/main_banner7.jpg",
            baseWidth: 800,
            baseHeight: 1418,

            banners: [
                {
                    id: "오른쪽-1",
                    top: 95,
                    left: 615,
                    width: 184,
                    height: 228
                },
                {
                    id: "오른쪽-2",
                    top: 481,
                    left: 613,
                    width: 184,
                    height: 252
                },
                {
                    id: "오른쪽-3",
                    top: 874,
                    left: 612,
                    width: 188,
                    height: 119
                },
                {
                    id: "오른쪽-4",
                    top: 994,
                    left: 613,
                    width: 186,
                    height: 72
                },
                {
                    id: "오른쪽-5",
                    top: 1067,
                    left: 614,
                    width: 181,
                    height: 160
                },
                {
                    id: "오른쪽-6",
                    top: 1226,
                    left: 614,
                    width: 187,
                    height: 186
                }
            ]
        }
    };


    /*
     * =========================================================
     * DOM
     * =========================================================
     */

    const popupModal = document.getElementById("popupModal");
    const targetImage = document.getElementById("targetImage");
    const highlightBox = document.getElementById("highlightBox");
    const closeBtn = document.getElementById("closeBtn");

    const viewBtn = document.getElementById("bannerLocationViewBtn");

    const popupBannerType =
        document.getElementById("popupBannerType");

    const popupBannerLocation =
        document.getElementById("popupBannerLocation");


    /*
     * =========================================================
     * 화면 이름 표시용
     * =========================================================
     */

    const bannerTypeName = {
        "banner_home": "HOME",
        "banner_newshome": "뉴스홈",
        "banner_news": "뉴스",
        "banner_youtube": "유튜브",
        "banner_community": "커뮤니티",
        "banner_town": "타운정보",
        "banner_realestate": "부동산"
    };


    /*
     * =========================================================
     * 배너 위치 찾기
     * =========================================================
     */

    function getBannerInfo() {

        const pageData = adData[bannerType];

        if (!pageData) {

            console.error(
                "등록되지 않은 banner_type:",
                bannerType
            );

            return null;
        }


        const bannerInfo = pageData.banners.find(function (banner) {

            return banner.id === bannerLocation;

        });


        if (!bannerInfo) {

            console.error(
                "등록되지 않은 banner_location:",
                bannerLocation
            );

            return null;
        }


        return {
            page: pageData,
            banner: bannerInfo
        };
    }


    /*
     * =========================================================
     * 하이라이트 위치 계산
     * =========================================================
     */

    function updateHighlightPosition(pageData, bannerInfo) {

        const currentWidth = targetImage.clientWidth;
        const currentHeight = targetImage.clientHeight;


        if (!currentWidth || !currentHeight) {
            return;
        }


        const scaleX =
            currentWidth / pageData.baseWidth;

        const scaleY =
            currentHeight / pageData.baseHeight;


        highlightBox.style.top =
            (bannerInfo.top * scaleY) + "px";

        highlightBox.style.left =
            (bannerInfo.left * scaleX) + "px";

        highlightBox.style.width =
            (bannerInfo.width * scaleX) + "px";

        highlightBox.style.height =
            (bannerInfo.height * scaleY) + "px";


        highlightBox.style.display = "block";
    }


    /*
     * =========================================================
     * 위치확인
     * =========================================================
     */

    function showBannerLocation() {

        const result = getBannerInfo();


        if (!result) {

            alert(
                "배너 위치 정보를 찾을 수 없습니다.\n\n" +
                "상단메뉴: " + bannerType + "\n" +
                "배너위치: " + bannerLocation
            );

            return;
        }


        const pageData = result.page;
        const bannerInfo = result.banner;


        /*
         * 모달 정보 표시
         */

        if (popupBannerType) {

            popupBannerType.textContent =
                bannerTypeName[bannerType] || bannerType;
        }


        if (popupBannerLocation) {

            popupBannerLocation.textContent =
                bannerLocation;
        }


        /*
         * 기존 highlight 제거
         */

        highlightBox.style.display = "none";


        /*
         * 이미지 변경
         */

        targetImage.onload = function () {

            updateHighlightPosition(
                pageData,
                bannerInfo
            );

        };


        targetImage.src = pageData.image;


        /*
         * 모달 열기
         */

        popupModal.style.display = "flex";


        /*
         * 캐시된 이미지라면 바로 계산
         */

        if (targetImage.complete) {

            updateHighlightPosition(
                pageData,
                bannerInfo
            );
        }
    }


    /*
     * =========================================================
     * 위치확인 버튼
     * =========================================================
     */

    if (viewBtn) {

        viewBtn.addEventListener(
            "click",
            showBannerLocation
        );
    }


    /*
     * =========================================================
     * 모달 닫기
     * =========================================================
     */

    function closeModal() {

        popupModal.style.display = "none";

        highlightBox.style.display = "none";
    }


    if (closeBtn) {

        closeBtn.addEventListener(
            "click",
            closeModal
        );
    }


    /*
     * 모달 바깥쪽 클릭
     */

    popupModal.addEventListener(
        "click",
        function (e) {

            if (e.target === popupModal) {

                closeModal();
            }

        }
    );


    /*
     * ESC 키
     */

    document.addEventListener(
        "keydown",
        function (e) {

            if (
                e.key === "Escape" &&
                popupModal.style.display === "flex"
            ) {

                closeModal();
            }

        }
    );


    /*
     * =========================================================
     * 브라우저 크기 변경
     * =========================================================
     */

    window.addEventListener(
        "resize",
        function () {

            if (
                popupModal.style.display !== "flex"
            ) {
                return;
            }


            const result = getBannerInfo();


            if (!result) {
                return;
            }


            updateHighlightPosition(
                result.page,
                result.banner
            );
        }
    );

});