library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

# well B6 po regeneraci!!!!!!

# recharge
Q = 0.0118 
# transmisivity 0.003548
T = 0.003548
#readius well
rv = 5
#storativity 0.0176
#0.000035
#0.0003825028
# 0.02 - 0.03 min
# 1.2 - 1.8
S = 0.0176

t0 = 1.2;
r = 5;
print( 2.246 * ((T * t0) / (r*r) ) )

field<- read.table("../data/b6_reg_obs_real.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")

time = field[1]
down = field[2]
t <- numeric()
s <- numeric()
theis_s <- numeric()
for(ti in time){
  t <- c(t, ti )
}
for(si in down){
  s <- c(s, si)
  theis_s <- c(theis_s, Theis(ti, Q, T, rv, S))
}



plot(t, s, col='black',  log = 'x', ylim=c(0.1,10), xlim=c(0.1,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
lines(t, theis_s, type="l", pch = 2, col='blue')

#legend(1,8,c('snížení na vrtu B6',expression("derivace funkce s"[v]*"(t)"), 'derivace Theisovy funkce'), cex=1, pch=c(1, NA, NA),lty = c(NA, 1,1), col=c('black','blue', 'red'))







