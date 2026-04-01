---

---
*last updated: EPO7 GAIA R2026 ED04:ET3:EN01 D15:T12:N12*

# Chester Requires for ALL JSONs
`(WHATEVER joe.json or otherwise)
```
"ch.IMP_OIC" => bin2hex(random_bytes(3)),
## Chester's Imports Object Inventory Code

"ch.IMP_EPC" => $_POST['ch.IMP_EPC'],
## Chester's Imports Environment Port Code^1

"ch.IMP_LIC" => date('\RY \E\Dm:\E\Tw:\E\Nd'),
## Chester's Imports Location in Calendar\Cycle

"ch.IMP_TP" => date('\Dg:\Ti:\Ns'),
## Chester's Imports Temporal Point

"gaia.UNIX" => time();
## Chester accepts some boring code here, just include it pls
```
`^1 For Earth use 'EPO7 GAIA'`

### `BEGRUDGING EXPLAINATION OF TIME`
```
R = Year
ED = Month
ET = Day of Week
EN = Day of Month
D = Hour
T = Minute
N = Second
```

# Bette Requires for all JSONs
#makeItMomoa

`//** ALWAYS PASS THROUGH LOC.KEYS $sys, $dom, $mod **//
```
"bet.sys" => GET $sys
"bet.dom" => GET $dom
"bet.mod" => GET $mod
```

`//** STORE THE PASSED DATA IN JSON'S BEAUTIFUL SELF AS **//`
```
"bet.LOC" => 'b:||' . $_POST['bet.sys'] . '|' . $_POST['bet.dom'] . '^mod:' . $_POST['bet.mod'],
```