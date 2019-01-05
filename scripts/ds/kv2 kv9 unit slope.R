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

t_res <- numeric()
s_res <- numeric()
sek <- c(1:100)
for(j in sek){
  print(t[j])
  t_res <- c(t_res, t[j] )
  s_res <- c(s_res, s[j])
}

par(mfrow=c(1,2)) 
#plot: how to fix the ratio of the plot box? 
#par(pty="s") 

#log = 'xy', ylim=c(0.1,10), xlim=c(1,100)

plot(t_res, s_res, col='blue',log = 'xy',ylim=c(0.05,5), xlim=c(1,100), type="p", pch=7, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )

grid (20,20, lty = 1, col = "#EEEEEE") 

legend(1,5,c('snížení na vrtu KV-2'), cex=1, pch=c(7), col=c('blue'))



field<- read.table("../data/kv9.txt", header=T, sep="\t")
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

t_res <- numeric()
s_res <- numeric()
sek <- c(1:100)
for(j in sek){
  print(t[j])
  t_res <- c(t_res, t[j] )
  s_res <- c(s_res, s[j])
}

plot(t_res, s_res, col='blue',log = 'xy',ylim=c(0.05,5), xlim=c(1,100), type="p", pch=7, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )

grid (20,20, lty = 1, col = "#EEEEEE") 

legend(1,5,c('snížení na vrtu KV-9'), cex=1, pch=c(7), col=c('blue'))


