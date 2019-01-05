library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b_3_obs.txt", header=T, sep="\t")
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

#plot(1,1, main=expression('title'^2))  #superscript
#plot(1,1, main=expression('title'[2])) #subscript

plot(t, s, col='black', log = 'x', xlim=c(100,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )



legend(1,10,c('snížení na vrtu B3','snížení na pozorovacím vrtu'), cex=1, pch=c(1,6), col=c('black','blue'))

