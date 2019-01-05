library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

# well B1 po regeneraci!!!!!!



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

plot(t, s, col='black',  log = 'x', ylim=c(0,6), xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )



field<- read.table("../data/kv9.txt", header=T, sep="\t")
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
}


lines(t, s, type="p", pch=7, col='blue')

legend(1,6,c('snížení na vrtu KV-2','snížení na vrtu KV-9'), cex=1, pch=c(1, 7), col=c('black','blue'))






