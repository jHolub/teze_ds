library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

# well B3!!!!!!

# recharge
Q = 0.014
# transmisivity - T = 0.00263, sklon nejlepe kolem 1.05
#0.00223987
#00227913
T = 0.0023
#readius well
rv = 0.161
#storativity
S = 0.2436766

field<- read.table("../data/b_3.txt", header=T, sep="\t")
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

# data z terenu a Theis
#plot(t, s, col='black', log = 'x', xlim=c(1,5000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
#lines(t, theis_s, type="p", pch = 6, col='blue')

# derivace funkce
div_data = numeric()
div_theis = numeric()
div_t = numeric()

for(i in 1:(length(t)-1) ){
  
  div = ( s[i+1] - s[i]) / ( log10(t[i+1]) - log10(t[i])) 
  div_data = c(div_data, div)
  
  divt = (theis_s[i+1] - theis_s[i]) / ( log10(t[i+1]) - log10(t[i])) 
  div_theis = c(div_theis, divt) 
  
  div_t = c(div_t, t[i])

  
}

mean(div_data)

mean(div_theis)

plot(div_t, div_data, col='black',  type="l", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
lines(div_t, div_theis, type="l", pch = 6, col='blue')




#legend(1,10,c('snížení na vrtu B3','snížení na pozorovacím vrtu'), cex=1, pch=c(1,6), col=c('black','blue'))

