<?php
include("encabezado.php");
echo'
    <main>
        <div class="d-flex justify-content-center" style="height: 400px; font-size: 100px;">
        <ul class="nav nav-pills" >
            <li class="nav-item" >
            <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa-solid fa-user"class="nav-link active"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-chair"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled"><i class="fa-solid fa-phone"></i></a>
                </li>
            </ul>
        </div>
    </main>';
include("footer.php");
?>


