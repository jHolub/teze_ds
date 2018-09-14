
   $( document ).ready(function() { 
 
    generateData();
 
     $('#chart1').bind('jqplotClick',function (ev, gridpos, datapos, neighbor) {   
        x = datapos.xaxis;
        y = datapos.yaxis;
        document.getElementById('w_point').value = y;
        document.getElementById('u_point').value = x;
        
        generateData();
        
     });


    window.onload = addListeners;

    function addListeners(){
        document.getElementById('dragg_button').addEventListener('mousedown', mouseDown, false);
        window.addEventListener('mouseup', mouseUp, false);
    }

    function mouseUp(){
        window.removeEventListener('mousemove', divMove, true);
    }

    function mouseDown(e){
      window.addEventListener('mousemove', divMove, true);
    }

    function divMove(e){

      div = document.getElementById('dragg_able');

      y = e.clientY + document.body.scrollTop;
      x = e.clientX;
      
        if(x > 100 && x < 580 && y > 300 && y < 590){
            
            document.getElementById('w_point').value = '';
            document.getElementById('u_point').value = '';
            
            div.style.position = 'absolute';
            div.style.top = y + 'px';
            div.style.left = x + 'px';
        } 
     }      
 });  

    function calculTheis(){

        W = document.getElementById('w_point').value;
        u = document.getElementById('u_point').value;      
        s = document.getElementById('s_point').value;
        t = document.getElementById('t_point').value;
        Q = document.getElementById('RECHARGE').value;
        r = document.getElementById('WELL_DISTANCE').value;

        T = (Q / (4 * Math.PI *s)) * W;
                
        S = (4 * T * u * t) / (r * r);
        
        document.getElementById('TRANSMISSIVITY').value = T;
        document.getElementById('STORATIVITY').value = S;

    }

    function generateData(){
        
        dataTheis = new Array();
     
        for(i = 1; i < 300; i= i*1.08){
           u = 2 / (i*i) ; 
           dataTheis.push(theis_fce(10,u));    
        } 

        theis(dataTheis);    
    }    
    
    function factorial(num){
        // If the number is less than 0, reject it.
        if (num < 0) {
            return -1;
        }
        // If the number is 0, its factorial is 1.
        else if (num == 0) {
            return 1;
        }
        // Otherwise, call this recursive procedure again.
        else {
            return (num * factorial(num - 1));
        }
    }
    
    function theis_fce(n_max,u){        
        
        suma = 0;
        
        data = [[]];
        
        for(n = 0;  n < n_max; n++){
            
            suma = suma + ( Math.pow(-1,(n+1)) * ( Math.pow(u,n) / factorial(n) * n ));
            
        }
        
        W = -0.577216 - Math.log(u) + suma; 
        
        return [1/u,W];

    }

    function theis(dataTheis){
        
        data = [[]];    
        for(i = 0; i < t.length; i++){
            data[i] = [t[i],s[i]];
         }      
   
        point = [[]]; 
        point[0]=[document.getElementById('u_point').value, document.getElementById('w_point').value]; 
   
        ploting(data);
        plotingImage(dataTheis,point);

    }   
        
        
     function ploting(data){
         
        document.getElementById('chart').innerHTML = "";
        
       $.jqplot.config.enablePlugins = false;
          
       $.jqplot('chart',[data],{
           title: 'SNÍŽENÍ V ČASE',
            grid: {
                drawGridLines: true,
                backgroundColor: "#F7FCFD",
                gridLineColor: 'black',
                gridLineWidth: 1,
                borderWidth: 0,      
                shadow: false
            },
            seriesDefaults:{
              markerOptions: {
                size: 7,
                shadow: false
              },
              shadow: false
            },
            series:[
            {color: "red",lineWidth: 2, markerOptions: { size: 6,shadow: false},shadow: false }
            ],
            axes: { 
                xaxis: {  
                     ticks: [0.1,10,1000,100000],
                     label: "t[s]",
                    tickOptions: {
                        fontSize: '13px',
                        textColor: "black",
                        formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                    },
                 renderer: $.jqplot.LogAxisRenderer
                },
                yaxis:{
                  ticks: [0.1,1,10,100],
                  min:0.1, 
                  max:100,
                  label: "s[m]",
                  tickOptions: {
                      fontSize: '13px',
                      textColor: "black",
                      formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                  },
                  renderer: $.jqplot.LogAxisRenderer
                } 
            }
        });  
        
      }  
        
       
    function plotingImage(dataTheis,point){
        
      document.getElementById('chart1').innerHTML = "";
        
       $.jqplot.config.enablePlugins = true;
          
      plot =  $.jqplot('chart1',[dataTheis,point],{
           title: 'W(1/u)',
            grid: {
                drawGridLines: true,
                gridLineColor: 'rgba(255, 255, 155, 0.2)',
                backgroundColor: "rgba(255, 255, 155, 0.2)",
                gridLineWidth: 0,
                borderWidth: 1,      
                shadow: false
            }, 
            cursor: {
                show: true,
                tooltipLocation:'se', 
                zoom:false,
                showVerticalLine:true,
                showHorizontalLine: true,
                fontSize: '13px'
            },
            seriesDefaults:{
              markerOptions: {
                size: 7,
                shadow: false
              },
              shadow: false
            },
            series:[
                {color: "blue",lineWidth: 2, markerOptions: { size: 6,shadow: false},shadow: false },
                {color: "#cc0066",lineWidth: 2, markerOptions: {lineWidth: 3, style: 'square',size: 12,shadow: false},shadow: false }
            ],

            axes: { 
                xaxis: {  
                     ticks: [0.1,1,10,100,1000,10000,100000],                     
                     label: "1/u",
                     labelOptions: {
                          fontSize: '10px'
                    },
                    tickOptions: {
                        show: false,
                        fontSize: '10px',
                        textColor: "black",
                        formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                    },
                 renderer: $.jqplot.LogAxisRenderer
                },
                yaxis:{
                  ticks: [0.1,1,10,100],
                  min:0.1, 
                  max:100,
                  label: "W",
                  labelOptions: {
                          fontSize: '10px'
                    },
                  tickOptions: {
                      show: false, 
                      fontSize: '10px',
                      textColor: "black",
                      formatString: '%.1f'                           //http://perldoc.perl.org/functions/sprintf.html                      
                  },
                  renderer: $.jqplot.LogAxisRenderer
                } 
            }
        });         
        
    }
