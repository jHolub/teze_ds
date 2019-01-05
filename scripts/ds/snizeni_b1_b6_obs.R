library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

field<- read.table("../data/b1_reg_obs.txt", header=T, sep="\t")
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


sek = seq(1, 2000, by=100)
print(pok) 
for (val in sek) {
  print(t[val])
}
for (val in sek) {
  print(s[val])
}


#plot(1,1, main=expression('title'^2))  #superscript
#plot(1,1, main=expression('title'[2])) #subscript

plot(t, s, col='black', log = 'x', ylim=c(0,3), xlim=c(20,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )

field<- read.table("../data/b6_reg_obs.txt", header=T, sep="\t")
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


lines(t, s, type="p", pch = 6, col='blue')

legend(20,3,c('snížení na pozorovacím vrtu B1','snížení na pozorovacím vrtu B6'), cex=1, pch=c(1,6), col=c('black','blue'))

