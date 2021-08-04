const inputdate = document.getElementById('input_date');
const inputtime = document.getElementById('input_time');

function search() {
    var date = checkinputdate();
    var time = checkinputtime();

    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status === 200) {
            document.getElementById('search-result').innerHTML = this.responseText;
        }
    }

    if(date && time) {
        xhttp.open('GET', "transaction-history-action.php?date=" + inputdate.value +"&time=" + inputtime.value);
        xhttp.send();
    }
}

function checkinputtime() {
    if(inputtime.value !=null) {
        return true;
    } return false;
}

function checkinputdate() {
    if(inputdate.value != null) {
        return true;
    } return false;
}