 
<?php
$this->embed('login.php');

$this->embed('register.php');
?>

<section>
    <div class="container" style="background-color: #F9F9F9;">
        <div class="row">
            <div class="col-sm-12"> 
                <h2>O programu</h2>
                <p>
                    Aplikace RadFlow je webová aplikace umožňující komplexní analýzu dat z hydrodynamických zkoušek.
                    <b>Pro přístup k jednotlivým analýzám je nutné vytvořit uživatelký účet.</b> Mezi základní datové analýzy pro vyhodnocení hydrodynamických čerpacích zkoušek patří:
                </p>
                <ul>
                    <li>Jacobova semilogaritmická metoda přímky</li>
                    <li> Theisova metoda typové křivky</li>
                    <li>vyhodnocení parametrů skutečného vrtu v podobě vlastního objemu vrtu a dodatečných odporů</li>
                </ul>  
                <p>
                    Dále aplikace nabízí možnost archivace jednotlivých datových sad, kdy je předpokládáno, že každý uživatel při práce s informačním systémem se bude moci k předešlým analýzám vracet a dle potřeby upravovat.

                    Přístup do aplikace v prostředí internet zajišťuje širokou dostupnost a snižuje kladené požadavky na hardwarové vybavení uživatele. 
                    Aplikaci spustí jakýkoli z nejpoužívanějších webových prohlížečů (Internet Explorer 9+, Google Chrome 10+, Mozilla Firefox 4+, Opera 10,5+ a další). 
                    Plnou funkčnost webové aplikace v jiných prohlížečích nelze stoprocentně zaručit. 
                </p>
            </div>
        </div>
    </div>
    <hr>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8"> 
                <h3>
                    <span class="glyphicon glyphicon-info-sign"></span> Čerpací zkouška
                </h3>
                <p>
                    Hydrodynamické zkoušky patří mezi základní metody stanovení hydraulických charakteristik zvodnělých vrstev.
                    Mezi hlavní vyhodnocované parametry patří transmisivita a storativita vrtu, tyto hlavní dva ukazatele 
                    definují základní fyzikální vlastnosti kolektoru, pro jejich stanovení se často používají metody odvozené z 
                    analytického řešení rovnice pro proudění podzemní vody, které byly odvozené za předpokladů ideálního vrt. 
                    <br><br>
                    Čerpací zkouška, která patří do skupiny hydrodynamických zkoušek, při nichž se ze zkušebního objektu odebírá 
                    konstantní množství vody a zaznamenává se reakce
                    zvodnělé vrstvy ve smyslu poklesu hladiny podzemní vody nebo tlaku na pozorovaném objektu. Čerpací zkoušku 
                    můžeme rozdělit dle režimu proudění podzemní vody k pozorovanému objektu:
                <ul>
                    <li>Čerpací zkouška za ustáleného režimu proudění</li>
                    <li>Čerpací zkouška za neustáleného režimu proudění</li>
                </ul>

                Kromě transmisivita a storativita vrtu jsou zde však další parametry definující skutečný stav horninového prostředí v průběhu hydrodynamické 
                zkoušky, které však často nejsou do vyhodnocení zahrnuty, mezi ně patří parametry skutečného vrtu. 
                </p>
            </div>
            <div class="col-sm-4">   
                <img src="./images/vrt.png">     
            </div>
        </div>
        <hr>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12"> 
                <h3>
                    <span class="glyphicon glyphicon-info-sign"></span> Parametry skutečného vrtu
                </h3>
            </div>
        </div>   
        <div class="row">
            <div class="col-sm-8"> 
                <h4>
                    Vlastní objem vrtu
                </h4>
                <p>
                    Na samotném začátku čerpací zkoušky odebírané množství vody pochází z vlastního objemu vrtu a nikoliv z  
                    okolního porézního prostředí. (Papadopulos and Cooper 1967). Vliv vlastního objemu vrtu na průběh 
                    čerpací zkoušky trvá jen několik minut a česem se snižuje (Fenske, 1977), 
                    přesto jeho zanedbáním dojde k nadhodnocení hodnoty statorativity vrtu, přestože vlastní objem 
                    vrtu ovlivňuje hodnoty snížení jen na počátku čerpací zkoušky (Black and Kipp, 1977).
                </p>
                <h4>
                    Dodatečné odpory
                </h4>
                <p>
                    Dodatečné odpory jsou způsobeny řadou jevů, které vznikají během samotného zhotovení vrtu, ale také v 
                    průběhu čerpaní podzemní vody z vrtu. Při vrtání horninovým prostředím dochází ke kolmataci okolí vrtu, 
                    což sebou přináší změnu hydraulických vlastností porézního prostředí a následný vliv na dataci podzemní 
                    vody do vrtu. Mezi další dodatečné odpory může zařadit zmenšení aktivní plochy vrtu, turbulentní režim 
                    proudění v blízkosti vrtu, hloubka vrtu neodpovídá mocnosti kolektoru a 
                    další. Díky velkému množství faktorů, které definují výslednou hodnotu dodatečných odporů, je obtížné 
                    jejich přesné určení, z toho důvodu se oblast jejich výskyt často zanedbána. Hodnota 
                    dodatečných odporů je definováno jako rozdíl hodnot skutečného snížení na vrtu a snížení vycházejícího 
                    z Theis modelu, pro delší časový úsek lze definovat vztahem (Van Everdingen 1953).

                    <br><br>
                    <i> sv = sw + ste</i>
                    
                    <br>
                    kde <b>sv</b> je snížení na vrtu vlivem čerpání, <b>sw</b> je snížení způsobené dodatečnými odpory a <b>ste</b> snižení vycházející z Theis modelu.
                    <br>

                </p>
            </div>
            <div class="col-sm-4">   
                <br><br>
                <img src="./images/vrt2.png">
                <br>
                <i>Vliv dodatečných odporů na průběh snížení hladiny podz. vody během čerpací zkoušky.</i>        
            </div>
        </div>
        <hr>
    </div> 
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12"> 
                <h3>
                    <span class="glyphicon glyphicon-education"></span> Literatura
                </h3>
                <ul>
                    <li>Agarwal, R. G., R. Al-Hussainy, and H. J. Ramey Jr., 1970: An investigation of wellbore storage and skin effect in unsteady liquid flow: I. Analytical treatment. Trans. Soc. Pet. Eng. AIME, 249, 279-290.</li>
                    <li>Black, J. H. and K. L. Kipp, 1977: Observation well response time and its effect upon aquifer test results. J. Hydrol., 34, 297-306, doi: 10.1016/0022-1694(77)90137-8.</li>
                    <li>Cooper, H. H., Jr. and C. E. Jacob, 1946: Generalized graphical method for evaluating formation constants and summarizing well-field history. Trans. AGU, 27, 526-534.</li>
                    <li>Fenske, P. R., 1977: Radial flow with discharging-well and observation-wellstorage. J. Hydrol., 32, 87-96, doi: 10.1016/0022-1694(77)90120-2.</li>
                    <li>Jargon, J. R., 1976: Effect of wellbore storage and wellbore damage at the active well on interference test analysis. J. Pet. Tech., 28, 851-858, doi: 10.2118/5795-PA.</li>
                    <li>Papadopulos, I. S. and H. H. Cooper, 1967: Drawdown in a wellof large diameter well. Water Resour. Res., 3, 241-244, doi: 10.1029/WR003i001p00241.</li>
                    <li>Pech, P: 2003, Determination of the skin factor in the early portion of an aquifer test. J. Environ. Hydrology, vol. 11, p. 1 - 9</li>
                    <li>Stehfest, H., 1970: Algorithm 368 numerical inversion of Laplace transforms [D5]. Commun. ACM, 13, 47-49, doi: 10.1145/361953.361969.</li>
                    <li>Theis, C. V., 1935: The relation between the lowering of the piezometric surface and the rate and duration of discharge of a well using Ground-Water Storage. Trans. AGU, 16, 519-524.</li>
                    <li>van Everdingen, A.F., Hurst, W., 1953. The skin effect and its influence on the productive capacity of the well. Transactions of the American Institute Mineralogical Metallurgical and Petrological Engineering. 198, 171–176.</li>
                    <li>Walton W.C., 1996: Designing Ground Water Models with Windows Software, Lewis publishing, Inc., New York, 62-64.</li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
</section>