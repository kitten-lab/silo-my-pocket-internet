# TPS Cords

GAIA EPO `AD` => TPS `GAIA.EPO7`
GAIA YEAR `2026` => TPS `fSTOP wen2.met0.men26`
GAIA DATE `21/12` => TPS `sROW vet21.ven12`

x/y/z

height/width/depth

EPO
M= Millennia
C= Century
D= Decade
Y= Year

```
A = [
	CC => [
		C => [
			D => [
				Y=> [
```

DATE
Mn= Month number
Md= Day of the Month number
Wn= Week number
Wd= Day of the Weeks Number
Yd= Day in the Year

```
....
dC = [
	Yd => "",
	M = [
		Mn => "",
		Md => ""
	]
	W = [
		Wn => "",
		Wd => "",
	]
],
```

TIME
Hh= hour
Mm= minute
Ss= second
Ms= unix to the ms

```
.....
tC = [
	Ms => "",
	Hh = [
		Mm = [
			Ss = ""
		]
	]
]
]
]
]
]
```