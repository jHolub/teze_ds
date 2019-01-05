library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/kv2.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")

time = field[1]
down = field[2]
t <- numeric()
s <- numeric()
for(ti in time){
  t <- c(t, ti )
}
for(si in down){
  s <- c(s, si)
}

par(mfrow=c(1,2)) 

plot(t, s, col='black', log = 'x', ylim=c(0,10), xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )

legend(1,10,c('snížení na vrtu KV-2'), cex=1, pch=c(1,6), col=c('black','blue'))


field<- read.table("../data/kv9_kor.txt", header=T, sep="\t")
colnames(field) <-c("time","drawdown")

time = field[1]
down = field[2]
t <- numeric()
s <- numeric()
for(ti in time){
  t <- c(t, ti )
}
for(si in down){
  s <- c(s, si)
}

plot(t, s, col='black', log = 'x', ylim=c(0,10), xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )


legend(1,10,c('snížení na vrtu KV-9'), cex=1, pch=c(1,6), col=c('black','blue'))

