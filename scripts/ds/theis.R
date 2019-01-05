#Jacobova (Jacob, 1946) aproximace zanedbáním třetího a vyššího 
# Theisova funkce -> agarwal pri zanedbani parametru skutecneho vrtu
Theis <- function(t, Q, T, rv, S){
  
  #drawdown
  s = (Q/ (4*pi*T) ) * log( 2.246 *T * t / (rv * rv * S) )
  
  return(s)
  
}

wellFc <- function(t, Q, T, rv, S){
  
  u = (r*r*S)/(4*T*t)
  return(u)
}

Thies_Lap <- function(p, r, rw){
  
  # r - radius, rw - radius well
  q = r / rw
  
  s =  besselK( q * sqrt(p), 0) / p
  
  return (s)
}
