function validation_value(val, msg) {

    if(val === "") {
        alert_msg(msg);
        return false;
    }

}
function alert_msg(msg) {

    alert(msg);
    return false;

}