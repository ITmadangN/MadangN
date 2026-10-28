<!-- INCLUDE FILE '../include/header.php' -->

          <!-- Section start -->
            <div class="section panel overflow-hidden">
                <div class="section-outer panel">
                    <div class="max-w-xl">
                        <div class="section-inner">
                            <a class="text-none" href="{{중앙긴배너_link}}" target="_blank" rel="nofollow">
                                <img class="d-none md:d-block" src="{{중앙긴배너_img}}" alt="#">
                                <img class="d-block md:d-none" src="{{중앙긴배너_img}}" alt="#">                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section start -->

      <!-- Section start -->
            <div class="section panel overflow-hidden mb-2 mt-2">
                <div class="section-outer panel">
                    <div class="max-w-lg">
                        <div class="section-inner">
                            <div class="block-layout grid-layout vstack gap-3 panel overflow-hidden">
                               <div class="block-content border-bottom pb-4" id="printable">
                                    
									<div class="panel child-cols-12 border-bottom pb-2 pt-2 md:pt-0 mb-3">
                                       <div class="col-12">
                                           <div class="panel vstack sm:hstack gap-3 justify-between">
                                              <div>
                                                <article class="post type-post panel uc-transition-toggle vstack gap-0">
                                                    <div class="post-media panel overflow-hidden hstack gap-2">
                                                       <div class="fw-bold sm:mt-0 h4">{{T_TITLE}}</div>
                                                    </div>
                                                    <div class="post-header panel vstack gap-1 mt-2">
                                                          
                                                           <span class="text-dark fw-medium fs-6 text-gray-900 text-opacity-70"> 등록 {{T_REPORT_DATE}}</span>
														    <span class="text-dark fw-medium fs-6 text-gray-900 text-opacity-90"> {{T_REPORTER_NAME}} 기자</span>
                                                           
                                                    </div>
                                                 </article>
                                               </div>
                                               <div class="toolbar">
                                                  <button class="btn2 print-btn" onclick="printSpecificArea()">
                                                   <span class="icon-print">🖨️</span>
                                                  </button>

                                                  <div class="size-controls">
                                                   <button class="btn2" onclick="changeFontSize(-1)">—</button>
                                                   <span class="label">가</span>
                                                   <button class="btn2" onclick="changeFontSize(1)">+</button>
                                                  </div>
                                               </div>
                                          </div>
                                       </div>
									</div><!-- Title -->

                            
                                  <div class="content_view mt-3" id="content_view" style="line-height:20px !important;">
                                    <div class="panel child-cols-12">


                                        {{T_CONTENT}}

                                           
                                     </div>
                                 </div><!-- Contents-->  
                               </div><!-- bottom_line-->  
                                   
						   </div>
                         </div>
                       </div>
                     </div>
                  </div>
            

            <!-- Section end -->
		   


<script>
 function printSpecificArea() {
  const content = document.getElementById('printable').innerHTML;
  const printWindow = window.open('', '_blank', 'width=1200,height=900');
  
  printWindow.document.write(`
    <html>
      <head>
        <style>
          body {padding: 10px;}
          #printable { 
            width: 1200px; 
            margin: 0 auto;
          }
          img { max-width: 100%; }
		  .toolbar { display: none !important; }
        </style>
      </head>
      <body>
        <div id="printable">
          ${content}
        </div>
      </body>
    </html>
  `);
  
  printWindow.document.close();
  
  // 2. 인쇄 실행
  setTimeout(() => {
    printWindow.print();
    printWindow.close();
  }, 500); 
}
</script>

									


<script defer src="/js/libs/jquery.min.js"></script>
<script defer src="/js/file.js"></script>
<script defer src="/js/news/society.js"></script>
<script defer src="/js/iibiz_common.js"></script>


<!-- INCLUDE FILE '../include/footer.php' -->

