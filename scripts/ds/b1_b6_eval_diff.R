library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b1_reg.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")
# recharge
Q = 0.0102
# transmisivity
T = 0.005883
#readius well
rv = 0.149
#storativity
S = 0.0155
# wellbore storage 43
cd = 43
#skin effect 20.89
sk = 20.89

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

par(mfrow=c(1,2)) 

plot(t, s, col='black',  log = 'x', ylim=c(0.1,10), xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
grid ( lty = 1, col = "#EEEEEE") 
lines(t, s_model, type="l",lwd=2, pch = 2, col='blue')
lines(t, diff, type="l", lwd=2, pch = 2, col='red')

legend(1,10,c('snížení na vrtu B1','Agarwal et al., 1970','Absolutní hodnota rozdílu'), cex=1, pch=c(1, NA, NA),lty = c(NA, 1,1), col=c('black','blue', 'red'))

########################################################################################3

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



legend(1,10,c('snížení na vrtu B6','Agarwal et al., 1970','Absolutní hodnota rozdílu'), cex=1, pch=c(1, NA, NA),lty = c(NA, 1,1), col=c('black','blue', 'red'))





