

b3<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/b_3.txt", header=T, sep="\t")
b6<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/b_6.txt", header=T, sep="\t")

b3obs<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/b_obs3.txt", header=T, sep="\t")
b6obs<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/b_obs6.txt", header=T, sep="\t")

points<- read.table("D:/Cerp_zkousky/clanky/clanek/visu/srbsko/points.txt", header=T, sep="\t")


plot(0, log="x",  xlab="t(s)", ylab="sw(m)", ylim=c(0,11), xlim=c(1,5000),type="n")
grid()
points(b3,pch=1, col='black')
points(b6,pch='+', col='black')
lines(b3obs,lwd=1, type="o",pch=1, col='black')
lines(b6obs,lwd=1, type="o",pch="+", col='black')