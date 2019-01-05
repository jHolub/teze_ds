library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b6_reg.txt", header=T, sep="\t")

colnames(field) <-c("time","drawdown")
# recharge
Q = 0.0118
# transmisivity
T = 0.003548
#readius well
rv = 0.1615
#storativity
S = 0.0176
# wellbore storage 42
cd = 42
#skin effect 8.1
sk = 8.1


cd_par <- seq(1, 1000, length.out=30)
sk_par <- seq(1, 15, length.out=20)
sink("output.txt")
for(cd in cd_par){
  for(sk in sk_par){
    
    time = field[1]
    down = field[2]
    td <- numeric()
    t <- numeric()
    sd <- numeric()
    s <- numeric()
    theis_s <- numeric()
    
    for(ti in time){
      td <- c(td, realToDimless(ti, 't', Q, T, rv, S) )
      t <- c(t, ti )
      theis_s <- c(theis_s, Theis(ti, Q, T, rv, S))
    }
    for(si in down){
      sd <- c(sd, realToDimless(si, 's', Q, T, rv, S))
      s <- c(s, si)
    }
    #dimensionless drawdown
    sd_model <- stehfest(td, cd, sk)
    #drawdown
    s_model <- numeric()
    for(sdi in sd_model){
      s_model <- c(s_model, dimmlessToReal(sdi, 's', Q, T, rv, S))
    }
    
    #Mean Squared Error
    #mse(sd_model, sd)
    #Nash-Sutcliffe Efficiency
    print(sk)
    print(cd)
    print(NSE(sd_model, sd))
    
    
    
    
    
    
    cat(NSE(sd_model, sd))
    cat('\t')
    cat(sk)
    cat('\t')
    cat(cd)
    
    
    cat("\n")
    
    
    
  }
  
}


sink()



