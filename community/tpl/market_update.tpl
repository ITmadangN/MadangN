<!-- INCLUDE FILE '../include/header.php' -->

<!-- Section start -->
<div class="section panel overflow-hidden mb-2">
    <div class="section-outer panel">
        <div class="max-w-lg">
            <div class="section-inner">
                <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                    <div class="block-header panel">
                        <div class="head_title">
                            <h3 class="h5 m-0 fw-bolder"><img src="/community/images/dot.png" alt="dot" class="pr-10"/>{{T_LISTING_TYPE}} 수정하기</h3>
                        </div>
                    </div>

                    <div class="border p-2 sm:p-4 bg-gray-25 rounded">
                        * 투명하고 안전한 중고 거래를 위해 상세 정보를 기재해 주세요.<br/>
                        * 구매 시기, 구성품 유무, 작동 여부를 꼼꼼히 적어주시면 좋습니다.<br/>
                        * 사기 예방을 위해 안전 결제나 대면 거래를 권장합니다.
                    </div>

                    <form name="formp" id="formp" action="ajax/ajax_market.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ac" value="market_update">
                        <input type="hidden" name="id" value="{{T_ID}}">
                        <input type="hidden" name="listing_type" id="lt" value="{{T_LT}}">
                        <div class="comborder mt-n1">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-0 sm:pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">기본정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">
                                   <!-- IF START 'NOT_COUPON' -->
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-globe fs-5"></i>
                                                <span>주선택<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="state_code" id="state_code" required onchange="GET_SELECT_CITY_NAME();" style="padding-left: 100px !important;">
                                                {{S_SELECT_STATE_CODE}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-map-marker fs-5"></i>
                                                <span>도시선택<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="city_name" id="city_name" required style="padding-left: 100px !important;">
                                                {{S_SELECT_CITY_NAME}}
                                            </select>
                                        </div>
                                    </div>
                                     <!-- IF END 'NOT_COUPON' -->
                                    <div class="col-12 md:col-6">
                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-phone fs-5"></i>
                                                <span>연락처</span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="contact_phone" id="contact_phone" placeholder="연락처" value="{{T_CONTACT_PHONE}}" style="padding-left: 100px !important;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="comborder">
                            <div class="w-100 sm:w-800px mx-auto">
                                <div class="border-bottom pt-3 pb-1 sm:pb-2 mb-1 sm:mb-0">
                                    <div class="fw-bold fs-4">물품 정보</div>
                                </div>
                                <div class="row g-1 margin22 pb-0 sm:pb-3">

                                    <div class="col-12">
                                        <!-- IF START 'NOT_COUPON_WANTED' -->
                                        <div class="position-relative d-flex align-items-center mb-1">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-list-alt fs-5"></i>
                                                <span>카테고리<span style="color:red;">*</span></span>
                                            </div>
                                            <select class="form-select rounded p-12 text-gray-900 text-opacity-60" name="marketplace_type" id="marketplace_type" required style="padding-left: 100px !important;">
                                                {{S_SELECT_MARKETPLACE_TYPE}}
                                            </select>
                                        </div>

                                        <div class="position-relative d-flex align-items-center mb-1">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-money fs-5"></i>
                                                <span>가격<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="marketplace_price" id="marketplace_price" placeholder="가격 $" required value="{{T_MARKETPLACE_PRICE}}" style="padding-left: 100px !important;">
                                        </div>
                                        <!-- IF END 'NOT_COUPON_WANTED' -->

                                        <div class="position-relative d-flex align-items-center">
                                            <div class="absoinput" style="display:flex; align-items:center; gap:6px; font-size:12px; font-weight:bold; width:90px; padding-left:10px; padding-top:0 !important; top:50% !important; transform:translateY(-50%) !important; height:auto !important;">
                                                <i class="fa fa-pencil fs-5"></i>
                                                <span>제목<span style="color:red;">*</span></span>
                                            </div>
                                            <input class="form-control form-control-sm h-40px w-full fs-6 bg-white" type="text" name="title" id="title" placeholder="제목" required value="{{T_TITLE}}" style="padding-left: 100px !important;">
                                        </div>

                                        <textarea class="form-control h-250px w-full fs-6 bg-white mt-1" type="text" placeholder="내용 *" name="description" id="description" required>{{T_DESCRIPTION}}</textarea>

                                        <!-- IF START 'NOT_COUPON' -->
                                        <div id="file-wrapper" class="mt-1">
                                            <div id="file-inputs">
                                                <!-- LOOP START 'T_LOOP' -->
                                                {{T_LOOP.T_HTML}}
                                                <!-- LOOP END 'T_LOOP' -->
                                            </div>
                                        </div>
                                        <!-- IF END 'NOT_COUPON' -->

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
    var G_IMG_NUM = {{}};
</script>

<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/libs/jquery.form.min.js"></script>
<script defer src="/js/libs/jquery.mask.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/community/market_update.js"></script>
<script defer src="/js/iibiz_common.js"></script>

<!-- INCLUDE FILE '../include/footer.php' -->
