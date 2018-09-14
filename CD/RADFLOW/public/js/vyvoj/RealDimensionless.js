
// t = time,  return array[td]
function timeToDimensionless(t) {

    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    td = ((T * t) / ((rv * rv) * S));

    return td;
}

//  s = pressure drop, return array sd
function drawdownToDimensionless(s) {

    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

// bezrozmerne snizeni          
    sd = (((2 * Math.PI * T) / Q) * s);

    return sd;
}


// t = time,  return array[td]
function DimensionlessToTime(td) {


    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);
    // cas 
    t = (td * ((rv * rv) * S)) / T;

    return t;
}

//  s = pressure drop, return array sd
function DimensionlessToDrawdown(sd) {

    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);
    
// snizeni  
    s = (sd * Q) / (2 * Math.PI * T);
    
    return s;
}

function createData(first_time, last) {

    if (first_time == 0 || first_time < 0) {
        first = 1;
    } else {
        first = first_time;
    }

    td = new Array();
    td[0] = first / 10;
    i = 1;

    while (td[i - 1] < last) {
        td[i] = td[i - 1] * 1.2;
        i++;
    }

    return td;
}
