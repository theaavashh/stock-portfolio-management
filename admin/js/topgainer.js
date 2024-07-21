function validation() {
    let a = document.getElementById('symbol').value;
    let b = document.getElementById('ltp').value;
    let c = document.getElementById('change').value;

    if (a == "") {
        document.getElementById('symbolerror').innerHTML = "This field is empty";
        return false;
    }
    else if (!isNaN(a)) {
        document.getElementById('symbolerror').innerHTML = "This field must be alphabet";
        return false;
    }
    else if (a.length < 2 || a.length > 10) {
        document.getElementById('symbolerror').innerHTML = "Recheck this field";
        return false;

    }
    else {
        document.getElementById('symbolerror').innerHTML = "";


    }


    if (b == "") {
        document.getElementById('ltperror').innerHTML = "This field is empty";
        return false;
    }
    else if (isNaN(b)) {
        document.getElementById('ltperror').innerHTML = "This field must be numeric";
        return false;
    }
    else if (b.length < 2 || b.length > 10) {
        document.getElementById('ltperror').innerHTML = "Recheck this field";
        return false;

    }
    else {
        document.getElementById('ltperror').innerHTML = "";

    }


    if (c == "") {
        document.getElementById('changeerror').innerHTML = "This field is empty";
        return false;
    }
    else if (isNaN(c)) {
        document.getElementById('changeerror').innerHTML = "This field must be numerical";
        return false;
    }
    else if(c.length > 2){
        document.getElementById('changeerror').innerHTML-"This field must be less";
        return false;
    }
    else {
        document.getElementById('changeerror').innerHTML = "";
        return true;

    }





}