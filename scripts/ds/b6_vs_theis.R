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
rv = 0.1615
#storativity 0.0176
S = 0.0176

field<- read.table("../data/b6_reg.txt", header=T, sep="\t")
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
  
  div = ( s[i+1] - s[i]) / ( t[i+1] - t[i]) 
  #div = ( s[i+1] - s[i]) / ( log10(t[i+1]) - log10(t[i])) 
  div_data = c(div_data, div)
  
  divt = (theis_s[i+1] - theis_s[i]) / ( t[i+1] - t[i]) 
  #divt = (theis_s[i+1] - theis_s[i]) / ( log10(t[i+1]) - log10(t[i]))
  div_theis = c(div_theis, divt)
  
  #print((theis_s[i+1] - theis_s[i]) / ( log10(t[i+1]) - log10(t[i]))  );
  print(t[i])
  print(1/wellFc(t[i], Q, T, rv, S))
  
  div_t = c(div_t, t[i])
  
}


plot(t, s, col='black',  log = 'x', ylim=c(-0.1,8), xlim=c(1,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
#lines(t, theis_s, type="l", pch = 2, col='blue')

legend(1,8,c('snížení na vrtu B6',expression("derivace funkce s"[v]*"(t)"), 'derivace Theisovy funkce'), cex=1, pch=c(1, NA, NA),lty = c(NA, 1,1), col=c('black','blue', 'red'))

par(new = TRUE)
plot(div_t, div_data, ylim=c(-0.1,0.5), axes=FALSE, type="l", log = 'x', lty = 1, xlab = '', ylab = '', col="blue")

axis(4, col="black")
lines(div_t, div_theis, type="l", lty = 1, col='red')






