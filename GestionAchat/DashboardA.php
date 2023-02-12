<?php
require_once('..\connexion.php');
include('SidebarA.php');
?>
    <style>
        .hero {
            text-align: center;
            margin: top;
        }
        h2 {
           font-size: 2.5rem;
           color: rgba(1, 32, 34, 0.781);
           text-align: center;
        }
        body.dark h2 {
            color: rgba(57, 173, 189, 0.911);
        }
        .hero .btn {
            text-align: center;
            padding: 1.4rem 3.7rem;
            font-size: 19px;
            font-family: 'Pacifico', cursive;
            font-weight: normal;
            background: rgba(2, 186, 241, 0.699);
            cursor: pointer;
            border: none;
            border-radius: 20px;
        }
        body.dark .btn {
            background-color: #87dcf1a2;
        }
        body.dark .btn a:hover {
            color: #242526;
        }
        .btn a {
            color: rgb(24, 0, 80);
            font-weight: bold;
            text-decoration: none;
        }
        .btn a:hover {
            color: rgb(3, 68, 59);
        }
        .hero{
            font: 50px;
        }
       </style>
    
        <div class="text">GESTION D'ACHATS</div>
        <div class="hero">
            <h2>Commander dès maintenant!</h2><br>
            <button class="btn"><a href="Commander.php">Passer ma commande</a></button>
        </div>
    </section>
</body>
</html>

  
<!-- Sidebar -->

       