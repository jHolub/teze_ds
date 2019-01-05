# recharge
Q = 0.00416
# transmisivity
T = 0.00984
#readius well
rv = 0.1125
#storativity
S = 0.076
# wellbore storage 
cd = 6.5
#skin effect
sk = 50.5

t = 1000

sv = 4.11369306

fr = Q/(4 * pi * T)


ln =  log( (2.246 * T * t) / (rv*rv*S) )

res = (sv / fr ) - ln

print(res / 2)