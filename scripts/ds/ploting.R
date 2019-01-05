

ploting <- function(td, sd, td1, sd1, td2, sd2, td3, sd3){

#plot(td, sd, type="p",col="black", ylim=c(0,20),
plot(td, sd, type="l", col='black',
     #log = 'x', 
    # ylim=c(0.01,10),
     lty = 1,
     lwd  = 1,
     main = '', sub = NULL, xlab = 'ds theis vs. field', ylab = 'dt thies vs. field')

lines(td1, sd1,lwd=1, type="l",
      lty = 1,
      col='blue')

# SECOND axis
if(length(td2) != 0){
par(new = TRUE)
plot(td2, sd2, axes=FALSE, type="l",
     log = 'y',
     lty = 2,
     xlab = '',
     ylab = '',
     col="green")
mtext("Cell Density",side=4,col="red",line=4) 
axis(4, col="black")
lines(td3, sd3,lwd=1, type="l",
      lty = 2,
      col='red')
}


#grid (lty = 6, col = "cornsilk2")

legend(1,100,c('Agarwal et al. (1970)','Jacob (1946)', 'ds/dt (Agarwal, 1970)', 'ds/dt (Jacob, 1946)'), cex=1, 
       #pch=c(1,2), 
       lty=c(1,1, 2, 2),
       col=c('black','blue', 'green', 'red'))

}