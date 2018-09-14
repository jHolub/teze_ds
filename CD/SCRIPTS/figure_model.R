

b3<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/dim_b3.txt", header=T, sep="\t")
b6<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/dim_b6.txt", header=T, sep="\t")



b3model<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/model_b3.txt", header=T, sep="\t")
b6model<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/model_b6.txt", header=T, sep="\t")



plot(0, log="x",  xlab="td()", ylab="swd()", ylim=c(0,17), xlim=c(5,15000),type="n")
grid()
points(b3,pch=1, col='black')
points(b6,pch='+', col='black')

lines(b3model,lwd=2, col='gray')
lines(b6model,lwd=2, col='gray')

legend(6,16.5,c('pump. well - B3','pump. well - B6','model: Equat. (3)'), cex=1, pch=c(1,3,3), col=c('black','black','gray'))


