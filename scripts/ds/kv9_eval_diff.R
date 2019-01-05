library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/kv9_kor.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")
# recharge
Q = 0.00416
# transmisivity
T = 0.00984
#readius well
rv = 0.1125
#storativity
S = 0.076
# wellbore storage 
cd = 6.5
#skin effect
sk = 50.5

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

diff <- numeric()

for(i in 1:(length(t)) ){
  
  diff = c(diff,  abs(s[i] - s_model[i]) )  
}


plot(t, s, col='black',  log = 'x', ylim=c(0.1,10), xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
grid ( lty = 1, col = "#EEEEEE") 
lines(t, s_model, type="l",lwd=2, pch = 2, col='blue')
lines(t, diff, type="l", lwd=2, pch = 2, col='red')

legend(1,10,c('snížení na vrtu KV-9','Agarwal et al., 1970','Absolutní hodnota rozdílu'), cex=1, pch=c(1, NA, NA),lty = c(NA, 1,1), col=c('black','blue', 'red'))

