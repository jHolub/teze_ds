function redraw() {

    dimData = realToDimensionless(t_input, s_input);

// bezrozmerny cas    
//    dimData[0]
// bezrozmerne snizeni    
//    dimData[1]

    modelTd = createTd(dimData[0][0], dimData[dimData.length - 1][0]);

    modelData = stehfest(modelTd);

    modelSd = new Array;

    for (l = 0; l < modelData.length; l++) {

        modelSd[l] = modelData[l][1];
    }

    modelST = realToDimensionless(modelTd, modelSd);

    ploting(modelData, dimData, 'chart',{x: 'td', y: "sd[]"});




// nash-sutcliffe kriterium

// bezrozmerne merene snizeni
    NS_sd = new Array();
    NS_td = new Array();
    for (j = 0; j < dimData.length - 1; j++) {

        NS_td[j] = dimData[j + 1][0];
        NS_sd[j] = dimData[j + 1][1];
    }

    NS_model = stehfest(NS_td);
    NS_sd_model = new Array();
    for (l = 0; l < NS_model.length; l++) {

        NS_sd_model[l] = NS_model[l][1];
    }

    NS = Nash_Sutcliffe(NS_sd, NS_sd_model);
    document.getElementById('NS').value = NS;

/*

//--------- rozmerne jednotky   
    data_input = new Array();
    for (l = 0; l < t_input.length; l++) {
        data_input[l] = [t_input[l], s_input[l]]
    }


    mdata_sd = new Array();
    mdata_td = new Array();
    for (l = 0; l < NS_model.length; l++) {
        mdata_td[l] = NS_model[l][0];
        mdata_sd[l] = NS_model[l][1];
    }
    mdata = dimensionlessToReal(mdata_td, mdata_sd);
    plotingReal(mdata, data_input, 'chart1');
//////////////////////////////////////////// 



    ///            td/wd       ////////////////////////////   

Wd = parseFloat(document.getElementById('WELL_STORAGE').value); 
 trans = parseFloat(document.getElementById('TRANSMISSIVITY').value);
 CCC = 0.0879;
 tdWddata = new Array();
 ratio = new Array();
 real_tdWddata = new Array();
 real_ratio = new Array();
 
 
 
 for(k = 0; k < mdata_td.length; k++){
     
    ratio[k] = mdata_td[k] / Wd;  
    real_ratio[k] = (2 * Math.PI * mdata[k][0] * trans) / CCC;
    
    tdWddata[k] =[ratio[k],mdata_sd[k]]; 
    real_tdWddata[k] =[real_ratio[k],dimData[k + 1][1]]; 
 }
    
  plotingLogLog(tdWddata,real_tdWddata,'chart2');   



*/


/*
    Wd = parseFloat(document.getElementById('WELL_STORAGE').value);
    trans = parseFloat(document.getElementById('TRANSMISSIVITY').value);
    CCC = 0.0879;
    tdWddata = new Array();
    ratio = new Array();
    real_tdWddata = new Array();
    real_ratio = new Array();

    genTd = [0.01];
    i = 1;
    last = 100000;
 
    while (genTd[i - 1] < (last * 10)) {
        genTd[i] = genTd[i - 1] * 1.2;
        i++;
    }

    modelTdWd = stehfest(genTd);

    for(kk = 0; kk < genTd.length; kk++){
   
        ratio[kk] = modelTdWd[kk][0] / Wd;
        tdWddata[kk] = [ratio[kk], modelTdWd[kk][1]];     
    }


    for (k = 0; k < mdata_td.length; k++) {
        
        real_ratio[k] = (2 * Math.PI * mdata[k][0] * trans) / CCC;
        real_tdWddata[k] = [real_ratio[k], dimData[k + 1][1]];
    }

    plotingLogLog(modelTdWd, real_tdWddata, 'chart2');
    
  */  
/////////////////////////////////////////////////////// 


}

function Nash_Sutcliffe(observ, model) {

    sumObserv = 0;

    for (i = 0; i < observ.length; i++) {

        sumObserv = sumObserv + observ[i];
    }
    meanSumObserv = sumObserv / observ.length;
    sum1 = 0;
    sum2 = 0;
    for (g = 0; g < observ.length; g++) {

        sum1 = sum1 + ((observ[g] - model[g]) * (observ[g] - model[g]));
        sum2 = sum2 + ((observ[g] - meanSumObserv) * (observ[g] - meanSumObserv));
    }

    return 1 - (sum1 / sum2);
}

function matching() {

    cd = [1, 10, 20, 30, 40, 50, 60, 70, 80, 90];
    //w = [1, 2, 3, 5, 7,8,9, 1, 13, 15, 18, 25, 35, 45, 55, 65, 68, 79, 80, 90, 100];
    w = [5, 10, 30, 50, 100];
    NS_sd = new Array();
    NS_td = new Array();
    for (j = 0; j < dimData.length - 1; j++) {

        NS_td[j] = dimData[j + 1][0];
        NS_sd[j] = dimData[j + 1][1];
    }

    NSmax = -100000000;
    cdCor = 0;
    wCor = 0;

    for (n = 0; n < cd.length; n++) {
        for (m = 0; m < w.length; m++) {

            document.getElementById('WELL_STORAGE').value = cd[n];        // storage well
            document.getElementById('SKIN').value = w[m];

            NS_model = stehfest(NS_td);
            NS_sd_model = new Array();
            for (l = 0; l < NS_model.length; l++) {

                NS_sd_model[l] = NS_model[l][1];
            }

            NS = Nash_Sutcliffe(NS_sd, NS_sd_model);

            if (NS > NSmax) {
                NSmax = NS;
                cdCor = cd[n];
                wCor = w[m];
            }
        }
    }
}