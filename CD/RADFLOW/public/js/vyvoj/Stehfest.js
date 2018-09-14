
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
function F_Thies(p) {

    // r distance of pumped well to observ. well
    // S storativity
    // p laplace parametr
    // T transmisivity

    T = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    r = parseFloat(document.getElementById('RADIUS_WELL').value);
    S = parseFloat(document.getElementById('STORATIVITY').value);

    rk = Math.sqrt(((r * r) * S * p) / T);

    hd = (BesselK0(rk) / p);

    return hd;
}
// return bezrozmerny cas a bezrozmenrne snizeni
function stehfest(td) {

    //STEHFEST TERMS 
    N = 10;
    // Vi presented by Walton(1996)
    Vi = new Array(0.08333333333333333, -32.08333333333334, 1279.0, -15623.66666666667, 84244.1666666666, -236957.5, 375911.66666666667, -340071.6666666667, 164062.5, -32812.5);

    sum = 0;
    i = 1;
    while (i <= N) {
        k = (i + i) / 2;
        p = i * (Math.log(2) / td);
        sum = sum + Vi[i - 1] * F(p);
        i++;
    }
// groundwater function - dimensionless drawdowns
    sd = Math.log(2) / td * sum;
    
    return sd;
}
