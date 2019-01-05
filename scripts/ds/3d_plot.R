require(lattice)



#field<- read.table("../data/kv9_param.txt", header=T, sep="\t")

field<- read.table("output.txt", header=T, sep="\t")

print(field)

colnames(field) <-c("NSE","W", 'Cd')

nse = field[1]
sk = field[2]
cd = field[3]
s <- numeric()
b <- numeric()
n <- numeric()

for(sp in sk){
  s <- c(s, sp )
}
for(cdp in cd){
  b <- c(b, cdp )
}
for(soo in nse){
  n <- c(n, soo )
}

wireframe(NSE ~ W + Cd, data=field,
          shade = TRUE, aspect = c(3, -1),
          light.source = c(1,10,20), main = "Parametrizace vrtu KV-9",
          scales = list(z.ticks=5,arrows=FALSE, col="black", font=10, tck=0.9),
          screen = list(z = 40, x = -75, y = 0)
          )