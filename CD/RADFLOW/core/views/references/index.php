 
<?php
    require_once \GLOBALVAR\VIEWS_PATH . '/account/login.php';
    require_once \GLOBALVAR\VIEWS_PATH . '/account/register.php';
?>

<h4>Jacobova semilogaritmická metoda přímky</h4>

<h5><b>Teorie</b></h5>

<img src="./images/references/jacob.png">

<h5><b>Jak postupovat?</b></h5>
1. Určíme přímkovou čast grafu s(t).
<br>
2. Kurzorem myši definujeme sklon přímkové části grafu je označen jako <b> i </b>.
<br>
3. Poté je možné přejít k samotnému výpočtu transmisivity, pro určení storativity nutné definovat hodnotu t0 (odečet z hodnot snížení na pozorovacím vrtu). 
<br>
<hr>




<h4>Theisova metoda typové křivky</h4>
<h5><b>Teorie</b></h5>

<img src="./images/references/theis.png">

<h5><b>Jak postupovat?</b></h5>
1. Určíme přímkovou čast grafu s(t).
<br>
2. Kurzorem myši vedeme graf W(1/u) v bodě shody zvolíme libovolný vztažný bod VB. 
<br>
3. Po bod VB dále provedeme odečet hodnot snížení <b> s </b> a času <b> t </b> z grafu s(t).
<br>
4. Následně je možné určit hodnoty tramsmisivity a storativity vrtu.
<br>
<hr>



<h4>Vyhodnocení dodatečných odporů a vlastního objemu vrtu</h4>

<h5><b>Teorie</b></h5>

<img src="./images/references/agarwal.png">

<h5><b>Jak postupovat (Agarwal)?</b></h5>
1. Pro analýzu je nutné předchozí určení hodnot storativity a transmisivity vrtu.
<br>
2. Uživatel pomocí posuvníku stanovuje hodnoty dodatečných odporů a vlastního objemu vrtu. Výsledkem tohoto procesu je nalezení nejlepší možné shody. 
<br>
3. Pro kontrolu je možné použít statického ukazatele - Nash–Sutcliffe koeficient.
<br>
<hr>
<h5><b>Jak postupovat (Pech)?</b></h5>
1. Pro analýzu je nutné předchozí určení hodnot storativity a transmisivity vrtu.
<br>
2. Uživatel kurzorem myši definuje první přímkový úsek grafu s(t).
<br>
3. Následně je vypočtena hodnota sklonu první přímkové časti <b> iz </b>. Na základě hodnoty vlastního objemu vrtu je stanovena hodnota dodatečných odporů Wd.
<br>
<hr>
<h4>Reference</h4>
<ul style="list-style-type:none">
    <li>1)	<i>Agarwal, R. G., R. Al-Hussainy, and H. J. Ramey Jr.</i>, 1970: An investigation of wellbore storage and skin effect in unsteady liquid flow: I. Analytical treatment. Trans. Soc. Pet. Eng. AIME, 249, 279-290.</li>
    <li>2)	<i>Black, J. H. and K. L. Kipp</i>, 1977: Observation well response time and its effect upon aquifer test results. J. Hydrol., 34, 297-306, doi: 10.1016/0022-1694(77)90137-8.</li>
    <li>3)	<i>Cooper, H. H., Jr. and C. E. Jacob</i>, 1946: Generalized graphical method for evaluating formation constants and summarizing well-field history. Trans. AGU, 27, 526-534.</li>
    <li>4)	<i>Fenske, P. R.</i>, 1977: Radial flow with discharging-well and observation-wellstorage. J. Hydrol., 32, 87-96, doi: 10.1016/0022-1694(77)90120-2.</li>
    <li>5)	<i>Garcia-Rivera, J. - Raghavan, R.</i>, 1979: Analysis of short-time pressure data dominated by wellbore storage and skin. J. Petrol. Technol., 623-631</li>
    <li>6)	<i>Chen, C. S. and C. G. Lan</i>, 2009: A simple data analysis method for a pumping test with skin and wellbore storage effects. Terr. Atmos. Ocean. Sci., 20, 557-562, doi: 10.3319/TAO.2008.05.16.01(Hy)</li>
    <li>7)	<i>Jargon, J. R.</i>, 1976: Effect of wellbore storage and wellbore damage at the active well on interference test analysis. J. Pet. Tech., 28, 851-858, doi: 10.2118/5795-PA.</li>
    <li>8)	<i>Moench A.F.</i>, 1985: Transient flow to a large-diameter well in an aquifer with storative semiconfining layers, Water Resour. Res., 21(8), 1121-1131</li>
    <li>9)	<i>Moench, A. and Ogata, A.</i>, 1984: Analysis of Constant Discharge Wells by Numerical Inversion of Laplace Transform Solutions, in Groundwater Hydraulics (eds J. S. Rosenshein and G. D. Bennett), American Geophysical Union, Washington, D. C.. doi: 10.1029/WM009p0146</li>
    <li>10)	<i>Papadopulos, I. S. and H. H. Cooper</i>, 1967: Drawdown in a wellof large diameter well. Water Resour. Res., 3, 241-244, doi: 10.1029/WR003i001p00241.</li>
    <li>11)	<i>Ramey, H. J. Jr.</i>: 1976, Practical Use of Modern Well Test Analysis, paper SPE, 5878 preseted at the SPE-AIME 46th Annual California Regional Meeting, Long Beach, CA, April 8-9, </li>
    <li>12)	<i>Pech, P</i>: 2003, Determination of the skin factor in the early portion of an aquifer test. J. Environ. Hydrology, vol. 11, p. 1 - 9</li>
    <li>13)	<i>Stehfest, H.</i>, 1970: Algorithm 368 numerical inversion of Laplace transforms [D5]. Commun. ACM, 13, 47-49, doi: 10.1145/361953.361969.</li>
    <li>14)	<i>Streltsova, T. D.</i>, 1988: Well Testing in Heterogeneous Formations, Wiley, New York, 413 pp.</li>
    <li>15)	<i>Taib D.</i>, 1995. Analysis of pressure und pressure derivative without type-curve matching – Skin and wellbore storage. Journal of Petroleum Science and Enginneering.: 170-181.</li>
    <li>16)	<i>Theis, C. V.</i>, 1935: The relation between the lowering of the piezometric surface and the rate and duration of discharge of a well using Ground-Water Storage. Trans. AGU, 16, 519-524.</li>
    <li>17)	<i>van Everdingen, A.F., Hurst, W.</i>, 1953. The skin effect and its influence on the productive capacity of the well. Transactions of the American Institute Mineralogical Metallurgical and Petrological Engineering. 198, 171–176.</li>
    <li>18)	<i>Walton W.C.</i>, 1996: Designing Ground Water Models with Windows Software, Lewis publishing, Inc., New York, 62-64.</li>
</ul>