library("zoo")
library("hydroGOF")

source("agarwal.R")
source("stehfest.R")
source("theis.R")
source("helpers.R")
source("ploting.R")

# well B1 po regeneraci!!!!!!

# recharge
Q = 0.0102 
# transmisivity 0.005883
T = 0.005883
#readius well 0.149
rv = 0.149
#storativity 0.0155
S = 0.0155
# dodatecne odpory
W = 20.89;


field<- read.table("../data/b1_reg.txt", header=T, sep="\t")
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
  
  #print(t[i])
  #print(1/wellFc(t[i], Q, T, rv, S))
  #print((theis_s[i+1] - theis_s[i]) / ( log10(t[i+1]) - log10(t[i]))  )
  #print(' ')
  
  div_theis = c(div_theis, divt) 
  
  div_t = c(div_t, t[i])
  
}

# snizeni vlivem dodatecny odporu
hw = (Q / (2*pi*T) ) * W
diff = theis_s[1000] - s[1000]
print(diff)
Wdiff = (diff / (Q / (2*pi*T) ))
print(s[1000])
print(theis_s[1000])
print(Wdiff)

par(mfrow=c(1,2)) 

plot(t, s, col='black',  log = 'x', ylim=c(-7,7), xlim=c(1,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
#lines(t, theis_s, type="l", pch = 2, col='blue')
lines(t, theis_s, type="l", lty = 7, col='red')
legend(1,7,c('snížení na vrtu B1','Thies model proudění',expression("derivace funkce s"[v]*"(t)"), 'derivace Theisovy funkce'), cex=1, pch=c(1, NA,NA, NA),lty = c(NA,1, 1,1), col=c('black','red','blue', 'green'))

par(new = TRUE)
plot(div_t, div_data, ylim=c(-0.1,0.5),xlim=c(1,2000), axes=FALSE, type="l", log = 'x', lty = 1, xlab = '', ylab = '', col="blue")

axis(4, col="black")
lines(div_t, div_theis, type="l", lty = 1, col='green')


# recharge
Q = 0.0118
# transmisivity
T = 0.003548
#readius well
rv = 0.1615
#storativity
S = 0.0176
# wellbore storage 42
cd = 42
#skin effect 8.1
sk = 8.1


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
  
  #print(t[i])
  #print(1/wellFc(t[i], Q, T, rv, S))
  #print((theis_s[i+1] - theis_s[i]) / ( log10(t[i+1]) - log10(t[i]))  )
  #print(' ')
  
  div_theis = c(div_theis, divt) 
  
  div_t = c(div_t, t[i])
  
}

# snizeni vlivem dodatecny odporu
hw = (Q / (2*pi*T) ) * W
diff = theis_s[1000] - s[1000]
print(diff)
Wdiff = (diff / (Q / (2*pi*T) ))
print(s[1000])
print(theis_s[1000])
print(Wdiff)


plot(t, s, col='black',  log = 'x', ylim=c(-7,7), xlim=c(1,2000), type="p", pch=1, xlab = 't [s]', ylab = expression("s"[v]*" [m]") )
#lines(t, theis_s, type="l", pch = 2, col='blue')
lines(t, theis_s, type="l", lty = 7, col='red')
legend(1,7,c('snížení na vrtu B1','Thies model proudění',expression("derivace funkce s"[v]*"(t)"), 'derivace Theisovy funkce'), cex=1, pch=c(1, NA,NA, NA),lty = c(NA,1, 1,1), col=c('black','red','blue', 'green'))

par(new = TRUE)
plot(div_t, div_data, ylim=c(-0.1,0.5),xlim=c(1,2000), axes=FALSE, type="l", log = 'x', lty = 1, xlab = '', ylab = '', col="blue")

axis(4, col="black")
lines(div_t, div_theis, type="l", lty = 1, col='green')







