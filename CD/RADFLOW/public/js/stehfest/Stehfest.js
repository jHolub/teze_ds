// JavaScript Document
// Project: RadFlow
// Author: Jiri Holub
// Description: Stehfest algorithm


function dimensionlessToReal(td, sd) {

    t = new Array();
    s = new Array();
    data = new Array;

    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    for (l = 0; l < td.length; l++) {

 // cas 
        t[l] = (td[l] * ((rv * rv) * S)) / T;
 
// snizeni  
        s[l] = (sd[l] * Q) / (2 * Math.PI * T);

        data[l] = [t[l], s[l]];
    }

    return data;
}


// t = time, s = pressure drop, return array[[td],[sd]]
function realToDimensionless(t, s) {

    td = new Array();
    sd = new Array();
    data = new Array;

    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    for (l = 0; l < t.length; l++) {

// bezrozmerny cas 
        td[l] = ((T * t[l]) / ((rv * rv) * S));
 
// bezrozmerne snizeni          
        sd[l] = (((2 * Math.PI * T) / Q) * s[l]);
        
        data[l] = [td[l], sd[l]];
    }

    return data;
}

// t = time,  return array[td]
function timeToDimensionless(t) {

    td = new Array();
    
    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    for (l = 0; l < t.length; l++) {

// bezrozmerny cas 
        td[l] = ((T * t[l]) / ((rv * rv) * S));
    }

    return td;
}

//  s = pressure drop, return array sd
function drawdownToDimensionless(s) {

    sd = new Array();
    
    Q = parseFloat(document.getElementById('RECHARGE').value);
    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    rv = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    for (l = 0; l < s.length; l++) {
 
// bezrozmerne snizeni          
        sd[l] = (((2 * Math.PI * T) / Q) * s[l]);
    }
    return sd;
}


function createTd(first_time, last_time) {

    if(first_time == 0 || first_time < 0){        
        first = 1;
    }else{
        first = first_time;
    }
    
    last = last_time;

    td = new Array();
    td[0] = first / 10;
    i = 1;
    
    while (td[i - 1] < (last * 10)) {
        td[i] = td[i - 1] * 1.2;
        i++;
    }
    
    return td;
}


//Laplace transform function, skin effect, wellbore storage
function F(p) {

    Cd = document.getElementById('WELL_STORAGE').value;        // storage well
    W = document.getElementById('SKIN').value;        // skin effect
/*
// odhad Cd    
    S = parseFloat(document.getElementById('STORATIVITY').value); 
    r = parseFloat(document.getElementById('RADIUS_WELL').value);
    C = 0.0879;
    Cd = (C / (2 * Math.PI * r * r * S));
   
    document.getElementById('WELL_STORAGE').value = Cd;

// odhad W
    QQ = 0.0023;
    TT = 0.0012379;
    ii = 3.37;
    W = (1 / 0.87) * ((( 2 * Math.PI * TT * ii)/ QQ) - (1.0127 * (Math.log(Cd) / Math.LN10)) - 1.0232);
    document.getElementById('SKIN').value = W;
*/
    // AGARWAL: Investigation of Wellbore_Storage and skin effect
    div = p * (Math.sqrt(p) * BesselK1(Math.sqrt(p)) + Cd * p * (BesselK0(Math.sqrt(p)) + W * Math.sqrt(p) * BesselK1(Math.sqrt(p))));

    // bezrozmerne snizeni v Laplasove prostoru
    hd = (BesselK0(Math.sqrt(p)) + (W * Math.sqrt(p) * BesselK1(Math.sqrt(p)))) / div;

    return hd;
}

//Laplace transform function, Theis equation
function F_1(p){
    
    // r distance of pumped well to observ. well
    // S storativity
    // p laplace parametr
    // T transmisivity

    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    r = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value); 
    
    rk = Math.sqrt(((r*r) * S * p) / T);
    
    hd = ( BesselK0(rk) / p );

    return hd;
}
// return bezrozmerny cas a bezrozmenrne snizeni
function stehfest(td) {

    //STEHFEST TERMS 
    N = 10;
    // Vi presented by Walton(1996)
    Vi = new Array(0.08333333333333333, -32.08333333333334, 1279.0, -15623.66666666667, 84244.1666666666, -236957.5, 375911.66666666667, -340071.6666666667, 164062.5, -32812.5);

    result = [[]];

    for (a = 0; a < td.length; a++) {

        sum = 0;
        i = 1;
        while (i <= N) {
            k = (i + i) / 2;
            p = i * (Math.log(2) / td[a]);
            sum = sum + Vi[i - 1] * F(p);
            i++;
        }
        // groundwater function - dimensionless drawdowns
        ft = (Math.log(2) / td[a]) * sum;

        result[a] = [td[a], ft];
    }

    return result;
}
