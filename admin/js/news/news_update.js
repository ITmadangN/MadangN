
$(document).ready(function() {

    var options = {

        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse  // post-submit callback

    };

    $('#formp').ajaxForm(options);
    
    $('#sort').mask('#');
    
    $('#report_date').mask('0000-00-00 00:00:00');
    

});

function showRequest(formData, jqForm, options) {

    var queryString = $.param(formData);

    return true;
}


function showResponse(responseText, statusText, xhr, $form)  {

 if(statusText === "success") {
         
         let json_data = JSON.parse(responseText);

         let status = json_data.status;
         let msg = json_data.msg;
         
         if(status === "success") {
                   
                   alert('업데이트가 정상적으로 수행되었습니다.');
                 location.href = "/admin/news/news_list.php";
 
         }
         else {
                   alert('등록에 실패했습니다. \n오류 : '+msg);
         }
    }
    else {
        alert('업데이트중에 오류가 발생했습니다.');
        alert('오류사항 : '+responseText);
    }

}