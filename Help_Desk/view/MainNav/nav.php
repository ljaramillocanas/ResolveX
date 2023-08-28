<?php
    if($_SESSION["rol_id"]==1){
        ?>
        <!-- VENTANA DE NAV PARA USUARIOS -->
        <nav class="side-menu">
            <ul class="side-menu-list">
                <li class="blue-dirty"> 
                    <a href="../Home"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Inicio</span>
                    </a>
                </li>
                <li class="blue-dirty"> 
                    <a href="../NuevoTicket/index.php"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Nuevo Ticket</span>
                    </a>
                </li>
                <li class="blue-dirty"> 
                    <a href="../ConsultarTicket/index.php"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Consultar ticket</span>
                    </a>
                </li>
            </ul>  
            <br>
            <div style="padding: 10px 10px 10px 10px; margin-top: 500px;margin-left: 42px;">
                 <a href="https://wa.me/573113238263/?text=Cordial Saludo, requiero asistencia del equipo de ResolveX" target="_blank">
                    <img src="../../public/img/wpp.png" width="100" height="100" padding="10px 10px 10px 60px" >
                    <br>
                    <span class="lbl" style="font-family: fantasy; color: green;  vertical-align: -webkit-baseline-middle;">¡RESOLX-BOT!</span>
                    <br>
                </a>
                <span class="lbl" style="font-family: sans-serif;color: green;margin-left: px;"> soporte virtual</span>
             </div> 
        </nav>
        <?php

    }else{
        ?>
        <!-- VENTANA DE NAV PARA ADMON -->
        <nav class="side-menu">
            <ul class="side-menu-list">
                <li class="blue-dirty"> 
                    <a href="../Home"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Inicio</span>
                    </a>
                </li>
                <li class="blue-dirty"> 
                    <a href="../ConsultarTicket/index.php"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Consultar ticket</span>
                    </a>
                </li>
                <li class="blue-dirty"> 
                    <a href="../MntUsuario/index.php"> 
                        <span class="glyphicon glyphicon-th"> </span>
                        <span class="lbl">Administrar usuarios</span>
                    </a>
                </li>
            </ul>  
        </nav>
        <?php
    }
?>

