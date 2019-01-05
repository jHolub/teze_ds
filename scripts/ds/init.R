library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b_6.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")
# recharge
Q = 0.014
# transmisivity
T = 0.00407681
#readius well
rv = 0.157
#storativity
S = 0.04907892
# wellbore storage
cd = 0

#skin effect
sk = 0




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

#sd_model_1 <- stehfest(td, cd, sk)

#Mean Squared Error
#mse(sd_model, sd)
#Nash-Sutcliffe Efficiency
#NSE(sd_model, sd)
#
# derivace funkce
div_data = numeric()
div_theis = numeric()
for(i in 0:(length(t)-1) ){
  div = (s[i] - s[i+1]) / (t[i] - t[i+1]) 
  div = div * 10
  div_data = c(div_data, div)
  
  divt = (theis_s[i] - theis_s[i+1]) / (t[i] - t[i+1]) 
  divt = divt * 10
  div_theis = c(div_theis, divt) 
}
div_data = c(div_data, 0)
div_theis = c(div_theis, 0)
# ploting
#ploting( t, s, t, s, NULL, NULL, NULL, NULL)
ploting( t, s, t, s_model,  t,div_data, NULL, NULL)

