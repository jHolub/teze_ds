## well init slope graph



library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b1_unit_slope.txt", header=T, sep="\t")
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
#plot: how to fix the ratio of the plot box? 
#par(pty="s") 

#log = 'xy', ylim=c(0.1,10), xlim=c(1,100)

plot(t, s, col='blue', log="y", ylim=c(0.1,10), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )

grid (20,20, lty = 1, col = "#EEEEEE") 

legend(1,10,c('vývoj sklonu na vrtu B1'), cex=1, pch=c(7), col=c('blue'))



field<- read.table("../data/b6_unit_slope.txt", header=T, sep="\t")
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


plot(t, s, col='blue', log="y", ylim=c(0.1,10), type="p", pch=1, xlab = 't [s]', ylab = expression("hodnota sklonu") )

grid (20,20, lty = 1, col = "#EEEEEE") 

legend(1,10,c('vývoj sklonu na vrtu B1'), cex=1, pch=c(7), col=c('blue'))





