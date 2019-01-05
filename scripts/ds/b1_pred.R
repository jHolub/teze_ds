library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

# well B1 po regeneraci!!!!!!



field<- read.table("../data/b1_pred.txt", header=T, sep="\t")
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

plot(t, s, col='black',  log = 'x', ylim=c(0,15), xlim=c(1,500), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )


legend(1,15,c('snížení na vrtu B1 před regenerací'), cex=1, pch=c(1), col=c('black'))


