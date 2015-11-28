<?

//http://stackoverflow.com/questions/12248997/get-data-as-string-from-ftp
function ftp_get_string($ftp, $filename) {
    $temp = fopen('php://temp', 'r+');
    if (@ftp_fget($ftp, $temp, $filename, FTP_BINARY, 0)) {
        rewind($temp);
        return stream_get_contents($temp);
    }
}

$conn_id = ftp_connect("ftp2.bom.gov.au") or die("No connection to BOM");
echo ftp_get_string($conn_id, "anon/gen/fwo/IDN10064.txt")
ftp_close($conn_id);
?>