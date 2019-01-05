library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

#
#
#POROVNANI jacob funkce vs. theis funkce
#

# well B6 po regeneraci!!!!!!
# recharge
Q = 0.0118 
# transmisivity 0.003548
T = 0.003548
#readius well
rv = 0.1615
#storativity 0.0176
S = 0.0176
# wellbore storage
cd = 0
#skin effect
sk = 0

field<- read.table("../data/b6_reg.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")




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
}
for(si in down){
  sd <- c(sd, realToDimless(si, 's', Q, T, rv, S))
  s <- c(s, si)
  theis_s <- c(theis_s, Theis(ti, Q, T, rv, S))
}
#dimensionless drawdown
sd_model <- stehfest(td, cd, sk)
#drawdown
s_model <- numeric()
for(sdi in sd_model){
  s_model <- c(s_model, dimmlessToReal(sdi, 's', Q, T, rv, S))
}


plot(t, s, col='black',  log = 'x', ylim=c(-0.1,8), xlim=c(1,2000), type="l", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
lines(t, s_model, type="l", pch = 2, col='blue')
lines(t, theis_s, type="l", pch = 2, col='red')

