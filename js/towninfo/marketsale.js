function GO_MARKET() {

    let s = $("#s").val();
    let c = $("#s_county").val();

    location.href = "/towninfo/marketsale.php?s=" + s + "&c=" + c;
}