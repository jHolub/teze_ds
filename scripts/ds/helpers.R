

dimmlessToReal <- function(val,  type, Q, T, rv, S) {
  res = FALSE
  
  if (type == 't') {
    #time
    res = (val * ((rv * rv) * S)) / T
    
  }
  
  if (type == 's') {
    #snizeni
    res = (val * Q) / (2 * pi * T)
    
  }
  
  return(res)
  
}


realToDimless <- function(val,  type, Q, T, rv, S) {
  res = FALSE
  
  if (type == 't') {
    #bezrozmerny cas
    res = ((T * val) / ((rv * rv) * S))
    
  }
  
  if (type == 's') {
    #bezrozmerne snizeni
    res = (((2 * pi * T) / Q) * val)
    
  }
  
  return(res)
  
}